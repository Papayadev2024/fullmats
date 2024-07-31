<?php

namespace App\Http\Controllers;

use App\Helpers\EmailConfig;
use App\Models\LibroReclamaciones;
use App\Http\Requests\StoreLibroReclamacionesRequest;
use App\Http\Requests\UpdateLibroReclamacionesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;


class LibroReclamacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mensajes = LibroReclamaciones::where('status' , '=', 1 )->orderBy('created_at', 'DESC')->get();
        
        return view('pages.claim.index', compact('mensajes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLibroReclamacionesRequest $request)
    {
        //
    }


    function storePublic(Request $request)
    {
        
        $validatedData = $request->validate([
            'fullname' => 'required|string',
            'type_document' => 'required|string',
            'number_document'=> 'required|string',
            'cellphone'=> 'required|numeric',
            'email'=> 'required|string',
            'department'=> 'required|string',
            'province'=> 'required|string',
            'district'=> 'required|string',
            'address'=> 'required|string',
            'typeitem'=> 'required|string',
            'amounttotal' => 'required|numeric',
            // 'category_product_service'=> 'required|string',
            'description'=> 'required|string',
            'type_claim'=> 'required|string',
            'date_incident'=> 'required|string',
            'address_incident'=> 'required|string',
            'detail_incident'=> 'required|string',
            'g-recaptcha-response' => 'required|captcha',
            
        ], [ 'g-recaptcha-response.required' => 'Por favor, completa el reCAPTCHA. Queremos asegurarnos de que no eres un robot.',
        'g-recaptcha-response.captcha' => 'El reCAPTCHA no es válido. Inténtalo de nuevo.',] );
        

        LibroReclamaciones::create($validatedData);
        $this-> envioCorreoLibrodeReclamacion($validatedData);
        return response()->json(['message' => 'Mensaje enviado']);
        
    }

    

    public function saveImg($file, $route, $nombreImagen)
    {
        $manager = new ImageManager(new Driver());
        $img =  $manager->read($file);

        if (!file_exists($route)) {
        mkdir($route, 0777, true); // Se crea la ruta con permisos de lectura, escritura y ejecución
        }
        $img->save($route . $nombreImagen);
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $message = LibroReclamaciones::findOrFail($id);

        $message->is_read = 1; 
        $message->save();

        return view('pages.claim.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LibroReclamaciones $libroReclamaciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLibroReclamacionesRequest $request, LibroReclamaciones $libroReclamaciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LibroReclamaciones $libroReclamaciones)
    {
        //
    }

    public function borrar(Request $request)
    {

        $mensaje = LibroReclamaciones::find($request->id);
        $mensaje->status = 0; 
        $mensaje->save();

        return response()->json(['success' => true]);

    }


    private function envioCorreoLibrodeReclamacion($data){
        $appUrl = config('app.url');
        $appName = config('app.name');
        $name = $data['fullname'];
        $mensaje = "Tu reclamo ha sido recepcionado";
        $mail = EmailConfig::config($name, $mensaje);
        
        try {
            $mail->addAddress($data['email']);
            $mail->Body = '<html lang="es">
            <head>
              <meta charset="UTF-8" />
              <meta name="viewport" content="width=device-width, initial-scale=1.0" />
              <title>.'.$appName.'.</title>
              <link rel="preconnect" href="https://fonts.googleapis.com" />
              <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
              <link
                href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
                rel="stylesheet"
              />
              <style>
                * {
                  margin: 0;
                  padding: 0;
                  box-sizing: border-box;
                }
              </style>
            </head>
            <body>
              <main>
                <table
                  style="
                    width: 600px;
                    height: 850px;
                    margin: 0 auto;
                    text-align: center;
                    background-image:url(' . $appUrl . '/images/Ellipse_18.png),  url(' . $appUrl . '/images/Tabpanel.png);
                    background-repeat: no-repeat, no-repeat;
                    background-position: center bottom , center bottom;;
                    background-size: fit , fit;
                    background-color: #f9f9f9;
                  "
                >
                  <thead>
                    <tr>
                      <th
                        style="
                          display: flex;
                          flex-direction: row;
                          justify-content: center;
                          align-items: center;
                          margin: 40px;
                        "
                      >
                          <img src="' . $appUrl . '/images/Group1.png" alt="img_logo"  style="
                    margin: auto;
                  "/>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td style="height: 10px">
                        <p
                          style="
                            
                            font-weight: 500;
                            font-size: 18px;
                            text-align: center;
                            width: 500px;
                            margin: 0 auto;
                            font-family: Montserrat, sans-serif;
                            line-height: 30px;
                          "
                        >
                          <span style="display: block">Hola </span>
                        </p>
                      </td>
                    </tr>
                    <tr>
                      <td style="height: 10px">
                        <p
                          style="
                            
                            font-size: 40px;
                            font-family: Montserrat, sans-serif;
                            line-height: 60px;
                          "
                        >
                          <span style="display: block">' . $name . ' </span>
                        </p>
                      </td>
                    </tr>
                    <tr>
                      <td style="height: 10px">
                        <p
                          style="
                            color: #006BF6;
                            font-size: 40px;
                            font-family: Montserrat, sans-serif;
                            font-weight: bold;
                            line-height: 60px;
                          "
                        >
                          !Gracias
                          <span style="color: #006BF6">por escribirnos!</span>
                        </p>
                      </td>
                    </tr>
                    <tr>
                      <td style="height: 10px">
                        <p
                          style="
                            color: #006bf6;
                            font-weight: 500;
                            font-size: 18px;
                            text-align: center;
                            width: 250px;
                            margin: 0 auto;
                            font-family: Montserrat, sans-serif;
                            line-height: 30px;
                          "
                        >
                          En breve estaremos comunicandonos contigo.
                        </p>
                      </td>
                    </tr>
                    <tr>
                    <td
                      style="
                      text-align: center;
                    "
                    >
                         <a
                      href="' . $appUrl . '"
                      style="
                        text-decoration: none;
                        background-color: #006bf6;
                        color: white;
                        padding: 10px 16px;
                        display: inline-flex;
                        justify-content: center;
                        align-items: center;
                        gap: 10px;
                        font-weight: 600;
                        font-family: Montserrat, sans-serif;
                        font-size: 16px;
                        border-radius: 30px;
                      "
                    >
                      <span>Visita nuestra web</span>
                    </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </main>
            </body>
          </html>
          ';
          $mail->addCC('atencionalcliente@boostperu.com.pe', 'luislopez@boostperu.com.pe',  'jefecomercial@boostperu.com.pe');
            $mail->isHTML(true);
            $mail->send();
            
        } catch (\Throwable $th) {
            //throw $th;
        }  
      }
}
