<?php 

class MediaController extends BaseController {

    public function show(){
        
        $data['url_current']    = Request::path();

        //$users = User::getAll();

        return View::make('admin.media',$data);
    }

    public function upload(){
        
        $data['url_current']    = Request::path();


        $file_max = ini_get('upload_max_filesize');
        //$file_max_string = display_filesize($file_max);
        // $file_max_str_leng = strlen($file_max);
        // $file_max_meassure_unit = substr($file_max,$file_max_str_leng - 1,1);
        // $file_max_meassure_unit = $file_max_meassure_unit == 'K' ? 'kb' : ($file_max_meassure_unit == 'M' ? 'mb' : ($file_max_meassure_unit == 'G' ? 'gb' : 'unidades'));
        // $file_max = substr($file_max,0,$file_max_str_leng - 1);
        // $file_max = intval($file_max);

        //handle second case
        if((empty($_FILES) && empty($_POST) && isset($_SERVER['REQUEST_METHOD']) && strtolower($_SERVER['REQUEST_METHOD']) == 'post'))
        { //catch file overload error...
             //grab the size limits...
            //return json_encode(array('success'=>false, 'message'=>sprintf('The file size should be lower than %s%s.',$file_max,$file_max_meassure_unit)));
            return Response::json(['success'=>false, 'message'=> 'A imagem deve ser inferior a' . $file_max ]);
        }        

        try{

            // if (!Input::hasFile('image'))
            //     return;

            //var_dump(Input::file('image'));

            foreach (Input::file('image') as $image) {

                // nome dinamico com time()
                $imageName = time() . $image->getClientOriginalName(); 
                //$imageSize = round($image->getSize()/1024 ); 
                //var_dump(round($imageSize / 1024));
                //display_filesize()

                //if ($imageSize < 2048){ //1065873
                    //upload
                    $uploadFlag = $image->move(storage_path() . '/images', $imageName); // dest, name

                    if ($uploadFlag)
                        $uploadedImages[] = $imageName;                
                //}else{
                    //return Response::json(['success'=> false, 'message'=> 'Imagem superior a 2mb']);
                //}


                
            }

            return Response::json(['success'=> true, 'message'=> 'imagens enviadas!', 'images' => $uploadedImages]);

        }catch(Exception $e){
            //echo "mais de 2mb";


            //return json_encode(array('success'=>false, 'message'=>sprintf('The file size should be lower than %s%s.',$file_max,$file_max_meassure_unit)));
            return Response::json(['success'=>false, 'message'=> 'A imagem deve ser inferior a ' . $file_max]);
        }
    }    

} // fim MediaController