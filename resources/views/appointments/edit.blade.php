<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>تعديل موعد</title>
</head>
<body>
    <h1>تعديل الموعد</h1>
    <form action="{{ route('appointments.update', $appointment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>العنوان:</label><br>
        <input type="text" name="title" value="{{ $appointment->title }}" required><br><br>

        <label>الوصف:</label><br>
        <textarea name="description">{{ $appointment->description }}</textarea><br><br>

        <label>التاريخ والوقت:</label><br>
        <input type="datetime-local" name="appointment_time" value="{{ date('Y-m-d\TH:i', strtotime($appointment->appointment_time)) }}" required><br><br>

        <button type="submit">💾 حفظ التعديلات</button>
    </form>
    <br>

</body>
</html>
