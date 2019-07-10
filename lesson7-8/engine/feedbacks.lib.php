<?php
$form = $_POST['feedbacks-form'];
$name = $form['name'] ?? '';
$message = $form['message'] ?? '';

if ($form && isset($form['submit']) && $name && $message) {
  doFeedBackAction('create', false, [
    'name' => $name,
    'message' => $message
  ]);
  header('Location: /feedbacks');
}

$deleteForm = $_POST['feedback-delete'];
if ($deleteForm && isset($deleteForm['delete'])) {
  doFeedBackAction('delete', $deleteForm['id']);
  header('Location: /feedbacks');
}

$updateForm = $_POST['feedback-form-edit'];
if ($updateForm && isset($updateForm['update'])) {
  doFeedBackAction('update', $updateForm['id'], [
    'id' => $updateForm['id'],
    'name' => $updateForm['name'],
    'message' => $updateForm['message']
  ]);
  header('Location: /feedbacks');
}


function doFeedBackAction($action, $id = false, $values = false)
{
  switch ($action) {
    case 'create':
      return addFeedback($values);
    case 'delete':
      return deleteFeedback($id);
    case 'update':
      return updateFeedback($id, $values);
    default:
      return false;
  }
}
