<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Company;

class CompanyController extends Controller
{
    function __construct()
    {
        $this->title = 'company';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $title = $this->title;
        $company = Company::orderBy('name','ASC')->get();
        return view('admin.'.$title.'.index',compact('title','company'));
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
         $model = $request->all();
        $data = Company::find($model['id']);
        if ($data->update($model)){
           return redirect('admin/'.$this->title)->with('success','Company Update');
        }else{
           return redirect('admin/'.$this->title)->with('success','Something Wrong!!');
        }
    }

    public function db_backup()
    {
         $host = config('database.connections.mysql.host');
        $username = config('database.connections.mysql.username');
        $password = config('database.connections.mysql.password');
        $database = config('database.connections.mysql.database');

        $mysqli = new \mysqli($host, $username, $password, $database);
        $mysqli->select_db($database);
        $mysqli->query("SET NAMES 'utf8'");

        $queryTables = $mysqli->query('SHOW TABLES');

        while($row = $queryTables->fetch_row()) {
            $target_tables[] = $row[0];
        }

        foreach ($target_tables as $table) {
            $result         =   $mysqli->query('SELECT * FROM '.$table);
            $fields_amount  =   $result->field_count;
            $rows_num=$mysqli->affected_rows;
            $res            =   $mysqli->query('SHOW CREATE TABLE '.$table);
            $TableMLine     =   $res->fetch_row();
            $content        = (!isset($content) ?  '' : $content) . "\n\n".$TableMLine[1].";\n\n";

            for ($i = 0, $st_counter = 0; $i < $fields_amount;   $i++, $st_counter=0) {
                while ($row = $result->fetch_row()) { //when started (and every after 100 command cycle):
                    if ($st_counter%100 == 0 || $st_counter == 0 ) {
                        $content .= "\nINSERT INTO ".$table." VALUES";
                    }

                    $content .= "\n(";

                    for($j=0; $j<$fields_amount; $j++) {

                        $row[$j] = str_replace("\n","\\n", addslashes($row[$j]));

                        if (isset($row[$j])) {
                            $content .= '"'.$row[$j].'"' ;
                        } else {
                            $content .= '""';
                        }

                        if ($j<($fields_amount-1)) {
                            $content.= ',';
                        }
                    }
                    $content .=")";

                    if ( (($st_counter+1)%100==0 && $st_counter!=0) || $st_counter+1==$rows_num) {
                        $content .= ";";
                    } else {
                        $content .= ",";
                    }

                    $st_counter=$st_counter+1;
                }
            } $content .="\n\n\n";
        }
        $backup_name = $database."_".date('H-i-s')."_".date('d-m-Y')."_".str_random(5).".sql";
        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: Binary");
        header("Content-disposition: attachment; filename=\"".$backup_name."\"");
        echo $content; exit;
    }
}
