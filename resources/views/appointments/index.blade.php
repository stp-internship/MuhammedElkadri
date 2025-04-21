<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>مواعيدي</title>
</head>
<body>
    <h1>قائمة المواعيد</h1>

    <a href="{{ route('appointments.create') }}"> إضافة موعد جديد</a>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>العنوان</th>
                <th>الوصف</th>
                <th>التاريخ والوقت</th>
                <th>الخيارات</th>
            </tr>
        </thead>
        <tbody>
        @foreach($appointments as $appointment)
     
            <tr style="{{ $appointment->appointment_time < now() ? 'opacity: 0.5;' : '' }}">
                <td>{{ $appointment->title }}</td>
                <td>{{ $appointment->description }}</td>
                <td>{{ $appointment->appointment_time }}</td>
                <td>
                    <a href="{{ route('appointments.edit', $appointment->id) }}">✏️ تعديل</a>
                    <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('هل أنت متأكد؟')">🗑️ حذف</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
