<?php
namespace App\Controller;

use App\Model\Entity\ {
    CategoryEntity,
    Post
};
use App\Connection;
use App\PaginatedQuery;

class CategoryController extends Controller{

    public function __construct()
    {
        $this->loadModel('category');
        $this->loadModel('post');     
    }

    public function all()
    {

        $paginatedQuery = new PaginatedQueryController(
            $this->category,
            $this->generateUrl('categories')
        );


        $categories = $paginatedQuery->getItems();
        $title = "Catégories";

        $this->render(
            "category/all",
            [
            "title" => $title,
            "categories" => $categories,
            "paginate" => $paginatedQuery->getNavHTML()
            ]);
        
    }

    public function show(array $params)
    {
        dd($params);
        $id = (int)$params['id'];
        $slug = $params['slug'];
        
        $category = $this->category->find($id);
        
        if (!$category) {
            throw new Exception('Aucune categorie ne correspond à cet ID');
        }

        if ($category->getSlug() !== $slug) {
            $this->generateUrl('category',['id' => $id,'slug' => $category->getSlug()]);
            http_response_code(301);
            header('Location: ' . $url);
            exit();
        }

        $title = 'categorie : ' . $category->getName();

        $uri = $this->generateUrl('category',['id' => $category->getId(),'slug' => $category->getSlug()]);

        $paginatedQuery = new PaginatedQueryController(
                $this->post,
                $uri
        );
        $postsById = $paginatedQuery->getItemsInId($id);

        $this->render(
            "category/show",
            [
                "title" => $title,
                "posts" => $postsById,
                "paginate" => $paginatedQuery->getNavHTML()
            ]);
    }
}