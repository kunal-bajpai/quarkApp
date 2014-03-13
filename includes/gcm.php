<?php
  class gcm
  {
    
    private static function get_reg_ID()
    {
      $devices=Device::find_all();
      if(is_array($devices))
        foreach($devices as $device)
            if($device->reg_id!='')
                $resultSet[]=$device->reg_id;
      return $resultSet;
    }
    
    private static function split_into_sets($completeSet)
    {
      for($i=0;$i<count($completeSet);$i++)
          $resultSet[$i/1000][]=$completeSet[$i];
      return $resultSet;
    }
    
    private static function send_curl($data,$regIDs)
      {
          // Set POST variables
        $url = 'https://android.googleapis.com/gcm/send';

        $fields = array(
            'registration_ids' => $regIDs,
            'data' => $data,
        );
 
        $headers = array(
            'Authorization: key=' . GOOGLE_API_KEY,
            'Content-Type: application/json'
        );
        // Open connection
        $ch = curl_init();
 
        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
 
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
 
        // Execute post
        $result = curl_exec($ch);
        self::fix_canonical($result,$regIDs);
        GcmLog::log_action($result);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        // Close connection
        curl_close($ch);
      }
    
    private static function send_data($data,$feature)
    {
        $data->feature=$feature;
        $completeSet=gcm::get_reg_ID();
        $splitSet=gcm::split_into_sets($completeSet);
        if(is_array($splitSet))
            foreach($splitSet as $set)
               gcm::send_curl($data,$set);
    }
    
    public static function send_update($update)
    {
        self::send_data($update,'update');
    }
    
    public static function send_remove_update($update)
    {
        self::send_data($update,'removeUpdate');
    }
    
    public static function send_add_sponsor($sponsor)
    {
        $sponsor->image=IMAGES.$sponsor->image;
        self::send_data($sponsor,'addSponsor');
    }
    
    public static function send_remove_sponsor($sponsor)
    {
        self::send_data($sponsor,'removeSponsor');
    }
    
    public static function send_event_venue($event)
    {
        $obj=new Event();
        $obj->id=$event->id;
	    $obj->venue=$event->venue;
        self::send_data($obj,'eventVenue');
    }
    
    public static function send_workshop_venue($workshop)
    {
        $obj=new Workshop();
        $obj->id=$workshop->id;
	    $obj->venue=$workshop->venue;
        self::send_data($obj,'workshopVenue');
    }
    
    private static function fix_canonical($result,$idSet)
    {
        $resultObj=json_decode($result);
        if($resultObj->canonical_ids>0)
            for($i=0;$i<count($idSet);$i++)
            {
                if(isset($resultObj->results[$i]->registration_id))
                    {
                        $device=Device::find_by_reg_id($idSet[$i]);
                        $device->reg_id=$resultObj->results[$i]->registration_id;
                        $device->save();
                    }
            }
            
    }
  }
?>
