<?php

// src/Controller/TaskController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Task;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

#[Route('/task', name: 'task_')]
class TaskController extends AbstractController
{

    #[Route('/', name: 'get_all', methods: ['GET'])]
    public function getAll(EntityManagerInterface $entityManager): JsonResponse
    {
        $tasks = $entityManager->getRepository(Task::class)->findAll();
// Assuming you have set up serialization groups or manually format your response
        return $this->json(['tasks' => $tasks]);
    }

    #[Route('/{taskId}', name: 'get_one', methods: ['GET'])]
    public function getOne(int $taskId, EntityManagerInterface $entityManager): JsonResponse
    {
        $task = $entityManager->getRepository(Task::class)->find($taskId);
// Handle null task scenario appropriately
        return $this->json(['task' => $task]);
    }

    #[Route('/', name: 'create', methods: ['POST'])]
    public function create(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $task = new Task();
// Populate the task entity from $data
        $entityManager->persist($task);
        $entityManager->flush();
        return $this->json(['task' => $task], Response::HTTP_CREATED);
    }

    #[Route('/{taskId}', name: 'update', methods: ['PUT'])]
    public function update(int $taskId, Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $task = $entityManager->getRepository(Task::class)->find($taskId);
        if (!$task) {
            return $this->json(['message' => 'Task not found'], Response::HTTP_NOT_FOUND);
        }
        $data = json_decode($request->getContent(), true);
// Update the task entity from $data
        $entityManager->flush();
        return $this->json(['task' => $task]);
    }

    #[Route('/{taskId}', name: 'delete', methods: ['DELETE'])]
    public function delete(int $taskId, EntityManagerInterface $entityManager): JsonResponse
    {
        $task = $entityManager->getRepository(Task::class)->find($taskId);
        if ($task) {
            $entityManager->remove($task);
            $entityManager->flush();
            return $this->json(['message' => 'Task deleted']);
        }
        return $this->json(['message' => 'Task not found'], Response::HTTP_NOT_FOUND);
    }
}
