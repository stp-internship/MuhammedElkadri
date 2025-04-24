<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مواعيدي</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">قائمة المواعيد</h1>
            <div>
                <a href="{{ route('appointments.create') }}" class="btn btn-primary me-2">
                    <i class="fas fa-plus"></i> إضافة موعد جديد
                </a>
                <a href="{{ route('appointments.export') }}" class="btn btn-success">
                    <i class="fas fa-download"></i> تحميل المواعيد
                </a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>العنوان</th>
                        <th>الوصف</th>
                        <th>التاريخ والوقت</th>
                        <th>الخيارات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($appointments as $appointment)
                        <tr class="{{ $appointment->appointment_time < now() ? 'text-muted' : '' }}">
                            <td>{{ $appointment->title }}</td>
                            <td>{{ $appointment->description }}</td>
                            <td>{{ $appointment->appointment_time }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i> تعديل
                                    </a>
                                    <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد؟')">
                                            <i class="fas fa-trash"></i> حذف
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/your-code.js"></script>
</body>
</html>
