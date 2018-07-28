<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;

class HomeController extends Controller
{
    /**
     * Download my Curriculum Vitae
     * @return pdf-file
     */
    public function downloadCV()
    {
        // Get the file
        $file= public_path(). "/downloads/test.pdf";

        // Set the headers into a var for readiness
        $headers = array(
              'Content-Type: application/pdf',
            );

        // Return the file
        return response()->file($file, $headers);
    }
}
