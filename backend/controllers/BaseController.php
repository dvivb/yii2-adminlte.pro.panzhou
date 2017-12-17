<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use app\models\Permissions;
use app\models\UserPermissions;


/**
 * UserController implements the CRUD actions for User model.
 */
class BaseController extends Controller
{
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            if(is_null(Yii::$app->user->identity)){
                $this->redirect(['/site/login']);
                return false;
            }
            
            $roleId =  yii::$app->user->identity->role;
            $permission = Yii::$app->controller->module->id.'/'.Yii::$app->controller->id.'/'.Yii::$app->controller->action->id;
            $premissionInfo = Permissions::find()->where(['permission_action'=>$permission])->asArray()->one();
            if($roleId == 1){ //管理员
                return true;
            }
            if(empty($premissionInfo) || is_null($premissionInfo)){
                Yii::$app->getSession()->setFlash('error', '权限不足,请联系管理员');
                $this->redirect(['/site/errors']);
                return false;
            }
            
            
            $roles = UserPermissions::find()->where(['role_id'=>$roleId,'permission_id'=>$premissionInfo['id']])->one();
            if(empty($roles) || is_null($roles)){
                Yii::$app->getSession()->setFlash('error', '权限不足,请联系管理员');
                $this->redirect(['/site/errors']);
                return false;
            }
            return true;
        }else{
            return false;
        }
         
    }

    public static function uploadImage($uplod_file)
    {
        // 文件存放路径
        $path = yii::$app->basePath . '\web\upload\image\\';

        // 允许上传的图片后缀
        $allowedExts = array("gif", "jpeg", "jpg", "png");
        $temp = explode(".", $uplod_file["file"]["name"]);

//        echo $uplod_file["file"]["size"];

        $data = [
            "code"      => 0,
            "message"   => ""
        ];

        $extension = end($temp);     // 获取文件后缀名
        if ((($uplod_file["file"]["type"] == "image/gif")
                || ($uplod_file["file"]["type"] == "image/jpeg")
                || ($uplod_file["file"]["type"] == "image/jpg")
                || ($uplod_file["file"]["type"] == "image/pjpeg")
                || ($uplod_file["file"]["type"] == "image/x-png")
                || ($uplod_file["file"]["type"] == "image/png"))
            && ($uplod_file["file"]["size"] < 204800)   // 小于 200 kb
            && in_array($extension, $allowedExts))
        {
            if ($uplod_file["file"]["error"] > 0) {
//                echo "错误：: " . $uplod_file["file"]["error"] . "<br>";
                $data = [
                    "code"      => 0,
                    "message"   => "错误：" . $uplod_file["file"]["error"]
                ];
            } else {
//                echo "上传文件名: " . $uplod_file["file"]["name"] . "<br>";
//                echo "文件类型: " . $uplod_file["file"]["type"] . "<br>";
//                echo "文件大小: " . ($uplod_file["file"]["size"] / 1024) . " kB<br>";
//                echo "文件临时存储的位置: " . $uplod_file["file"]["tmp_name"] . "<br>";

                // 判断当期目录下的 upload 目录是否存在该文件
                // 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
                if (file_exists($path . $uplod_file["file"]["name"]))
                {
                    $data = [
                        "code"      => 0,
                        "message"   => "错误：" . $uplod_file["file"]["name"] . " 文件已经存在！"
                    ];
                } else {
                    // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
                    // move_uploaded_file($uplod_file["file"]["tmp_name"], "upload/" . $uplod_file["file"]["name"]);
                    if (move_uploaded_file($uplod_file["file"]["tmp_name"], $path . $uplod_file["file"]["name"])){
                        $data = [
                            "code"      => 1,
                            "message"   => "成功：" . $uplod_file["file"]["name"] . " 文件上传成功！",
                            "path"      => $path,
                            "name"      => $uplod_file["file"]["name"],
                        ];
                    }else{
                        $data = [
                            "code"      => 0,
                            "message"   => "错误：" . $uplod_file["file"]["name"] . " 文件上传失败！"
                        ];
                    }
                }
            }
        } else {
            $data = [
                "code"      => 0,
                "message"   => "错误：文件格式不支持！"
            ];
        }

        return $data;
    }

    public static function uploadExcel($uplod_file)
    {
        // 文件存放路径
        $path = yii::$app->basePath . '\web\upload\excel\\';

        // 允许上传的图片后缀
        $allowedExts = array("csv", "xls", "xlsx");
        $temp = explode(".", $uplod_file["file"]["name"]);

//        echo $uplod_file["file"]["size"];

        $data = [
            "code"      => 0,
            "message"   => ""
        ];

        $extension = end($temp);     // 获取文件后缀名
        if ((($uplod_file["file"]["type"] == "application/vnd.ms-excel")
                || ($uplod_file["file"]["type"] == "application/vnd.ms-excel")
                || ($uplod_file["file"]["type"] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"))
            && ($uplod_file["file"]["size"] < 2048000)   // 小于 200 M
            && in_array($extension, $allowedExts))
        {
            if ($uplod_file["file"]["error"] > 0) {
//                echo "错误：: " . $uplod_file["file"]["error"] . "<br>";
                $data = [
                    "code"      => 0,
                    "message"   => "错误：" . $uplod_file["file"]["error"]
                ];
            } else {
//                echo "上传文件名: " . $uplod_file["file"]["name"] . "<br>";
//                echo "文件类型: " . $uplod_file["file"]["type"] . "<br>";
//                echo "文件大小: " . ($uplod_file["file"]["size"] / 1024) . " kB<br>";
//                echo "文件临时存储的位置: " . $uplod_file["file"]["tmp_name"] . "<br>";

                // 判断当期目录下的 upload 目录是否存在该文件
                // 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
                if (file_exists($path . $uplod_file["file"]["name"]))
                {
                    $data = [
                        "code"      => 0,
                        "message"   => "错误：" . $uplod_file["file"]["name"] . " 文件已经存在！"
                    ];
                } else {
                    // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
                    // move_uploaded_file($uplod_file["file"]["tmp_name"], "upload/" . $uplod_file["file"]["name"]);
                    if (move_uploaded_file($uplod_file["file"]["tmp_name"], $path . $uplod_file["file"]["name"])){
                        $data = [
                            "code"      => 1,
                            "message"   => "成功：" . $uplod_file["file"]["name"] . " 文件上传成功！",
                            "path"      => $path,
                            "name"      => $uplod_file["file"]["name"],
                        ];
                    }else{
                        $data = [
                            "code"      => 0,
                            "message"   => "错误：" . $uplod_file["file"]["name"] . " 文件上传失败！"
                        ];
                    }
                }
            }
        } else {
            $data = [
                "code"      => 0,
                "message"   => "错误：文件格式不支持！"
            ];
        }

        return $data;
    }

    public static function uploadFile($uplod_file)
    {
        // 文件存放路径
        $path = yii::$app->basePath . '\web\upload\file\\';

        // 允许上传的图片后缀
        $allowedExts = array("gif", "jpeg", "jpg", "png", "csv", "xls", "xlsx");
        $temp = explode(".", $uplod_file["file"]["name"]);

//        echo $uplod_file["file"]["size"];

        $data = [
            "code"      => 0,
            "message"   => ""
        ];

        $extension = end($temp);     // 获取文件后缀名
        if ((($uplod_file["file"]["type"] == "image/gif")
                || ($uplod_file["file"]["type"] == "image/jpeg")
                || ($uplod_file["file"]["type"] == "image/jpg")
                || ($uplod_file["file"]["type"] == "image/pjpeg")
                || ($uplod_file["file"]["type"] == "image/x-png")
                || ($uplod_file["file"]["type"] == "image/png")
                || ($uplod_file["file"]["type"] == "application/vnd.ms-excel")
                || ($uplod_file["file"]["type"] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"))
            && ($uplod_file["file"]["size"] < 222204800)   // 小于 200 kb
            && in_array($extension, $allowedExts))
        {
            if ($uplod_file["file"]["error"] > 0) {
//                echo "错误：: " . $uplod_file["file"]["error"] . "<br>";
                $data = [
                    "code"      => 0,
                    "message"   => "错误：" . $uplod_file["file"]["error"]
                ];
            } else {
//                echo "上传文件名: " . $uplod_file["file"]["name"] . "<br>";
//                echo "文件类型: " . $uplod_file["file"]["type"] . "<br>";
//                echo "文件大小: " . ($uplod_file["file"]["size"] / 1024) . " kB<br>";
//                echo "文件临时存储的位置: " . $uplod_file["file"]["tmp_name"] . "<br>";

                // 判断当期目录下的 upload 目录是否存在该文件
                // 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
                if (file_exists($path . $uplod_file["file"]["name"]))
                {
                    $data = [
                        "code"      => 0,
                        "message"   => "错误：" . $uplod_file["file"]["name"] . " 文件已经存在！"
                    ];
                } else {
                    // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
                    // move_uploaded_file($uplod_file["file"]["tmp_name"], "upload/" . $uplod_file["file"]["name"]);
                    if (move_uploaded_file($uplod_file["file"]["tmp_name"], $path . $uplod_file["file"]["name"])){
                        $data = [
                            "code"      => 1,
                            "message"   => "成功：" . $uplod_file["file"]["name"] . " 文件上传成功！",
                            "path"      => $path,
                            "name"      => $uplod_file["file"]["name"],
                        ];
                    }else{
                        $data = [
                            "code"      => 0,
                            "message"   => "错误：" . $uplod_file["file"]["name"] . " 文件上传失败！"
                        ];
                    }
                }
            }
        } else {
            $data = [
                "code"      => 0,
                "message"   => "错误：文件格式不支持！"
            ];
        }

        return $data;
    }

    public static function upload($upload_files)
    {
        $date = date("Ymd");
        // 文件存放路径
        $os_path = yii::$app->basePath . '/web/';
        $diy_path =  'upload/' . $date .'/';
        $base_path = $os_path . $diy_path;
        if (!file_exists($base_path)){
            mkdir($base_path);
        }
        if (!empty($upload_files)) {
            foreach ($upload_files as $file) {
                $file->saveAs($base_path . $file->baseName . '.' . $file->extension);
                $paths[] = $diy_path . $file->baseName . '.' . $file->extension;
            }
            return $paths;
        } else {
            return false;
        }
    }

    public static function importExcel($file)
    {
        $objReader = new \PHPExcel_Reader_Excel2007();
        $objPHPExcel = $objReader->load($file);
        $dataArray   = $objPHPExcel->getActiveSheet()->toArray();

        return $dataArray;
    }

    public static function exportExcel()
    {
        $objPHPExcel = new \PHPExcel();

        // Set document properties
        $objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
            ->setLastModifiedBy("Maarten Balliauw")
            ->setTitle("Office 2007 XLSX Test Document")
            ->setSubject("Office 2007 XLSX Test Document")
            ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
            ->setKeywords("office 2007 openxml php")
            ->setCategory("Test result file");


        // Add some data
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Hello')
            ->setCellValue('B2', 'world!')
            ->setCellValue('C1', 'Hello')
            ->setCellValue('D2', 'world!');

        // Miscellaneous glyphs, UTF-8
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A4', 'Miscellaneous glyphs')
            ->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç');

        // Rename worksheet
        $objPHPExcel->getActiveSheet()->setTitle('Simple');


        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);


        // Redirect output to a client’s web browser (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="01simple.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0

        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');

    }
}
