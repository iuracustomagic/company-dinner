<?php

namespace App\Http\Controllers;

use App\Models\UserList;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpParser\Node\Expr\Cast\Object_;

class ExcelImportController extends Controller
{
    public function upload(Request $request)
    {
        $file = $request->file('excel_file');
        $date_from = $request->get('date_from');
        $date_to = $request->get('date_to');
        $fileExtension = $file->getClientOriginalExtension();

        if($fileExtension == 'xls' || $fileExtension == 'xlsx') {
            $data = $this->importExcel($file);

            // обработка полученных данных
            if(!empty($data)) {
                $users = array();
                foreach ($data as $item ) {

//                    if ( DB::table('user_list')->where('list_id', $item->id)->where('user_id', $user->id)->exists()) {
                    $users[] = [
                        'user_card' => $item[0],
                        'user_name' => $item[1],
                        'price' => $item[2],
                        'division' => $item[3]
                    ];
//                        $users['user_card'] = $item[0];
//                        $users['user_name'] = $item[1];
//                        $users['price'] = $item[2];
//                        $user['division'] = $item[3];
//

//                    }

                }
//                dd($users);
                $userList = new UserList();
                $userList->users = json_encode($users, JSON_UNESCAPED_UNICODE);
                $userList->date_from = $date_from;
                $userList->date_to = $date_to;
                $userList->created_at = now();
                $userList->updated_at = now();
                $userList->save();

            }

            return back()->with('success','Файл успешно загружен');
        } else {
            return back()->with('error','Некорректный формат файла');
        }
    }
    public function importExcel($file)
    {
        $reader = IOFactory::createReaderForFile($file);
        $spreadsheet = $reader->load($file);
        $worksheet = $spreadsheet->getActiveSheet();

        $rows = $worksheet->toArray();

        unset($rows[0]); // удалить заголовок таблицы

        return $rows;
    }
}
