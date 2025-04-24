<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل موعد</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h1 class="h3 mb-0">تعديل الموعد</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('appointments.update', $appointment->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">العنوان:</label>
                                <input type="text" name="title" class="form-control" value="{{ $appointment->title }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">الوصف:</label>
                                <textarea name="description" class="form-control" rows="3">{{ $appointment->description }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">التاريخ والوقت:</label>
                                <input type="datetime-local" name="appointment_time" class="form-control" value="{{ date('Y-m-d\TH:i', strtotime($appointment->appointment_time)) }}" required>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save"></i> حفظ التعديلات
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
