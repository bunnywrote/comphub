<?php
class CategoryController extends Controller{
    protected $template;

    public function actionIndex(int $id)
    {
        $this->template = "index";
        $this->viewBag['categories'] = Category::getAllByParentId($id);

        $this->getView("Category", $this->template);
    }

    public function actionError()
    {
        $this->template = "error";

        $this->getView("Category", $this->template);
    }
}
?>