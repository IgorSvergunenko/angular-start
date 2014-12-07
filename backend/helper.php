<?php

/**
 * Validate inputs
 *
 * @param $formData
 * @return array
 * @author Igor Svergunenko igorsvergunenko@nixsolutions.com
 */
function cleanInput($formData) {

    // remove js, style, html code
    $search = [
        '@<script[^>]*?>.*?</script>@si',
        '@<[\/\!]*?[^<>]*?>@si',
        '@<style[^>]*?>.*?</style>@siU',
        '@<![\s\S]*?--[ \t\n\r]*>@'
    ];

    foreach($formData as $key => $inputData) {
        $inputData = preg_replace($search, '', $inputData);
        $formData[$key] = $inputData;
    }

    return $formData;
}

/**
 * Show response
 *
 * @param $response
 * @return string
 * @author Igor Svergunenko igorsvergunenko@nixsolutions.com
 */
function echoResponse($response) {
    echo json_encode($response);
}