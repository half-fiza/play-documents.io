<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FileDetails;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ApiDocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $fileApiDetailsView, $toolListToDisplay;
    public function index()
    {
        // To fill the tool available for documents.
         $this->getToolsList();
         $returnToolList = $this->toolListToDisplay;

        // To get the file view in table format.
        $this->fileView();
        $returnArray = $this->fileApiDetailsView ;
      

        return view('apidocument', compact('returnArray','returnToolList'));
    }

 
    public function fileUpload(Request $req){
         
        
       
        //$file->move("api-documents/".$req->toolsName, $filename);
        $toolTable = DB::table('tools')->where('name', strtolower($req->toolsName))->first();
       
        $req->validate([
        'file' => 'required|mimes:html|max:2048',
        'toolsName' => 'required'
        ]);
        $fileModel = new FileDetails;
        if($req->file()) {
            $fileName =   $req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs("api-documents/".$req->toolsName, $fileName);
             $fileModel->file_path = 'storage/app/'.$filePath;
             $fileModel->tool_id = $toolTable->id;
             $fileModel->is_deleted = 0;
             $fileModel->updated_at = time();
             $fileModel->save();
             return back()
            ->with('success','File has been uploaded.')
            ->with('file', $fileName);
        }
   }

   /**
    * Undocumented function
    *
    * @return void
    */
   public function fileView(){
        
        $apiFileDetailsDB = DB::table('api_file_details')
        ->join('tools', 'tools.id', '=', 'api_file_details.tool_id')
        ->select('api_file_details.*', 'tools.name as toolName')
        ->get();
       
        if(!empty($apiFileDetailsDB)){
            foreach($apiFileDetailsDB as $key=>$value){
             $this->fileApiDetailsView[$value->tool_id]['tool_id'] = $value->tool_id;
             $this->fileApiDetailsView[$value->tool_id]['tool_name'] = $value->toolName;
             $this->fileApiDetailsView[$value->tool_id]['file_path'] = $value->file_path;
             $this->fileApiDetailsView[$value->tool_id]['is_deleted'] = $value->is_deleted;
             $this->fileApiDetailsView[$value->tool_id]['updated_at'] = $value->updated_at;
            }
        }  
   
   }

   public function getToolsList(){
  
        $getToolsList = DB::table('tools')->get();
        
        if(!empty($getToolsList)){
            foreach($getToolsList as $val){
                $this->toolListToDisplay[$val->id] =  ucfirst($val->name);
            }
        }
        
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
