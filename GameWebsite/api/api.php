<?php
    if (isset($_COOKIE["username"])) {
        function fetchRAWG($sA)
        {
                $ch2 = curl_init();
                $sB = str_replace(" ", "%20", "https://api.rawg.io/api/games?key=7da2ce5bfa5d4c0dbc6e02d906b9387a&20".$sA);
                curl_setopt($ch2, CURLOPT_URL, "$sB");
                curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
    
                $output = curl_exec($ch2);
                echo $output;
                return json_decode($output,true);
        }
        $arrRAWG = fetchRAWG($sSearch);
        foreach($arrRAWG["results"] as $element)
        {
            $myVideoGameName = $element["name"];
            
        }  
    } else {
        echo "Not logged in";
        return null;
    }
    
?>