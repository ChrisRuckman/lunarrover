<?php
    function returnAssertion($email, $salt) {
        header('Content-Type: application/json');
        $hashEmail = 'sha256$' . hash('sha256', $email . $salt);
        $filename = substr($hashEmail, 7, 10) . '.json';
        $assert = '{
    "recipient": "' . $hashEmail . '",
    "salt": "' . $salt . '",
    "badge": {
        "version": "0.0.1",
        "name": "Lunar Rover Geometry Badge",
        "image": "http://badges.cet.edu/lunarrover/v3LunarRoverBadge.png",
        "description": "In Lunar Rover Geometry, students apply their knowledge of the rate formula and Pythagorean theorem to a space exploration challenge",
        "criteria": "http://badges.cet.edu/lunarrover/v3LunarRoverCertificate.pdf",
        "issuer": {
            "origin": "http://badges.cet.edu/",
            "name": "Lunar Rover Geometry",
            "org": "Center for Educational Technology at Wheeling Jesuit University, Home of the NASA-Sponsored Classroom of the Future",
            "contact": "badges@cet.edu"
        }
   }
}';        

        $fp = fopen('badgeAsserts/' . $filename, 'w');
        fwrite($fp, $assert);
        fclose($fp);

        $getrequest = file_get_contents('http://beta.openbadges.org/baker?assertion=http://badges.cet.edu/lunarrover/badgeAsserts/' . $filename, 'r');

        //die("assertion file complete\r\n" . $getrequest);
    }
    //returnAssertion('ruckman@cet.edu', 'wjucet');
?>
