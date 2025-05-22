<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Tour Request</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: auto;
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .header {
            background-color: #d8870f;
            color: white;
            /* padding: 20px; */
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 30px;
            padding: 20px 0;
        }
        .content {
            padding: 30px;
        }
        .content p {
            margin: 10px 0;
            font-size: 15px;
            color: #333;
        }
        .content strong , .text-sm {
            display: inline-block;
            width: 100px;
            color: #555;
        }
        .button-container {
            text-align: center;
            margin: 30px 0;
        }
        .button {
            background-color: #d8870f;
            color: #fff;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            display: inline-block;
        }
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 12px;
            color: #aaa;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <img src="{{ asset('logo.jpeg') }}" alt="Logo" style="width: 120px; height: auto;">
            <h2>🌍 New Tour Request</h2>
        </div>
        <div class="content">
            @if($tourRequest->tour_id)
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-start">
            {{-- Image on the left --}}
                <div>
                        <img src="{{ asset('storage/' . $tourRequest->tour->main_image) }}"
                            class="rounded-lg object-cover"
                            alt="Tour image" style="width: 100% !important; height: 200px !important;">
                </div>

                {{-- Tour info on the right (2/3 width) --}}
                <div class="md:col-span-2">
                    <p class="text-gray-700"><strong>Description:</strong>{{ \Illuminate\Support\Str::limit(strip_tags($tourRequest->tour->description), 150) }}</p>
                    <p class="text-gray-400"><strong>Duration:</strong> {{ $tourRequest->tour->duration_days }} days</p>

                    <div class="grid grid-cols-2 gap-4">
                        <p><strong>From:</strong> {{ $tourRequest->tour->startLocation->name }} </p>
                        <p><strong>To:</strong> {{ $tourRequest->tour->endLocation->name }}</p>
                        <p><strong>Activity:</strong> {{ ucfirst($tourRequest->tour->section->name) }}</p>
                    </div>
                </div>
            </div>
            @endif
            <p><strong>Type:</strong> {{ $tourRequest->type }}</p>
            <p><strong>Name:</strong> {{ $tourRequest->name }}</p>
            <p><strong>Email:</strong> {{ $tourRequest->email }}</p>
            <p><strong>Phone:</strong> {{ $tourRequest->phone }}</p>
            <p><strong>Country:</strong> {{ $tourRequest->country }}</p>
            <p><strong>Adults:</strong> {{ $tourRequest->adult_people }}</p>
            <p><strong>Kids:</strong> {{ $tourRequest->kids_people ?? 0 }}</p>
            @if($tourRequest->from_city && $tourRequest->to_city)
                <p><strong>From City:</strong> {{ $tourRequest->from_city }}</p>
                <p><strong>To City:</strong> {{ $tourRequest->to_city }}</p>
            @endif
            <p><strong>Date Start:</strong> {{ \Carbon\Carbon::parse($tourRequest->date_from)->format('Y-m-d') }}</p>
            <p><strong>Date End:</strong> {{ \Carbon\Carbon::parse($tourRequest->date_from)->format('Y-m-d') }}</p>
            <p><strong>Message:</strong><br>{{ $tourRequest->message }}</p>
        </div>
        <div class="button-container">
            <a href="{{ url('/admin/tour-requests') }}" class="button">View in Dashboard</a>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} Terra Sud Adventures. All rights reserved.
        </div>
    </div>
</body>
</html>

