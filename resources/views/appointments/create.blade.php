<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>إضافة موعد</title>
</head>
<body>
    <h1>إضافة موعد جديد</h1>
    <form action="{{ route('appointments.store') }}" method="POST">
        @csrf
        <label>العنوان:</label><br>
        <input type="text" name="title" required><br><br>

        <label>الوصف:</label><br>
        <textarea name="description"></textarea><br><br>

        <label>التاريخ والوقت:</label><br>
        <input type="datetime-local" name="appointment_time" required><br><br>

        <button type="submit">💾 حفظ</button>
    </form>
    <br>

</body>
</html>
