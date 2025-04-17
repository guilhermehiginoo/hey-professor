<!-- resources/views/question/edit.blade.php -->
<h1>Editar Question</h1>
<form action="" method="POST">
    @csrf
    <!-- Adicione os campos necessários aqui -->
    <input type="text" name="title" value="{{ $question->title }}" placeholder="Título">
    <textarea name="content" placeholder="Conteúdo">{{ $question->content }}</textarea>
    <button type="submit">Salvar</button>
</form>
