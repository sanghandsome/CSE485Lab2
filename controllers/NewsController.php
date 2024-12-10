<?php
require(__DIR__ . '/../models/news.php');

class NewsController
{
    private $model;

    public function __construct($db)
    {
        $this->model =  new News($db);
    }

    // Hiển thị danh sách tin tức
    public function index()
    {
        $news = $this->model->getAllNews();
        require __DIR__ . '/../views/admin/news/index.php';

    }

    // Hiển thị form thêm tin tức
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'image' => $_POST['image'],
                'category_id' => $_POST['category_id']
            ];
            $this->model->createNews($data);
            header('Location: index.php?controller=news&action=index');
        }
        require './views/news/Add.php';
    }

    // Hiển thị form sửa tin tức
    public function edit($id)
    {
        $news = $this->model->getNewsById($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'image' => $_POST['image'],
                'category_id' => $_POST['category_id']
            ];
            $this->model->updateNews($id, $data);
            header('Location: index.php?controller=news&action=index');
        }
        require './views/news/Edit.php';
    }

    // Xóa tin tức
    public function delete($id)
    {
        $this->model->deleteNews($id);
        header('Location: index.php?controller=news&action=index');
    }
}
?>
