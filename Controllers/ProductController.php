<?php
class ProductController extends Controller{
    protected $template;

    public function actionIndex(int $id)
    {
        $this->template = "index";

        $this->viewBag['product'] = Product::getById($id);

        $this->getView("Product", $this->template);
    }

    public function actionError()
    {
        $this->template = "error";

        $this->getView("Product", $this->template);
    }
}
?>