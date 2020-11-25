<?php

declare(strict_types=1);

namespace UI\Http\Rest\Controller\Product;

use Application\Command\Product\CreateProductCommand;
use Domain\Product\Type\ProductType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use UI\Http\Rest\Controller\CommandController;

class CreateProductController extends CommandController
{
    /**
     * @Route("/product", methods={"POST"})
     */
    public function __invoke(Request $request)
    {
        $form = $this->createForm(ProductType::class);
        $form->submit(json_decode($request->getContent(), true));

        if (!$form->isValid()) {
            return new JsonResponse([], Response::HTTP_BAD_REQUEST);
        }

        $product = $form->getData();
        $command = new CreateProductCommand($product);

        $this->exec($command);


        return new JsonResponse($product->getProductId(), Response::HTTP_OK);
    }
}
