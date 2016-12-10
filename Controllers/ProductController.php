<?php
class ProductController extends Controller{
    protected $template;

    public function actionIndex(int $id)
    {
        $this->template = "index";

        $this->viewBag['product'] = Product::getByIdWithProperty($id);

//        Helper::varDebug($this->viewBag);

        $this->getView("Product", $this->template);
    }

    public function actionError()
    {
        $this->template = "error";

        $this->getView("Product", $this->template);
    }
}
?>