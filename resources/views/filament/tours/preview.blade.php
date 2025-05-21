@php
    $tourData = $tour->tour;
@endphp

<div class="space-y-6">
    {{-- Tour image and basic info side by side --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-start">
        {{-- Image on the left --}}
        <div>
            @if ($tourData?->main_image)
                <img src="{{ asset('storage/' . $tourData->main_image) }}"
                    class="rounded-lg object-cover w-full h-48"
                    alt="Tour image">

            @endif
        </div>

        {{-- Tour info on the right (2/3 width) --}}
        <div class="md:col-span-2 space-y-2">
            <h2 class="text-xl font-bold">
                {{ $tourData->name ?? 'No Tour Selected' }}
            </h2>
            @if($tourData)
                <p class="text-sm text-gray-400"><strong>Duration:</strong> {{ $tourData->duration_days }} days</p>
                <p class="text-gray-700">{!! $tourData->description !!}</p>

                <div class="grid grid-cols-2 gap-4 text-sm text-gray-400 mt-2">
                    <div><strong>Type:</strong> {{ $tourData->tourType->name ?? '-' }}</div>
                    <div><strong>Activity:</strong> {{ ucfirst($tourData->section->name) }}</div>
                </div>
            @endif
        </div>
    </div>

    {{-- Divider --}}
    <hr class="my-4 border-gray-300">

    {{-- Tour Request Info --}}
    <div class="space-y-4">
    <h3 class="text-lg font-bold">Tour Request Information</h3>

    <table class="table-auto w-full text-sm ">
        <tbody>
            <tr>
                <td class="font-bold pr-4 text-gray-400">Name:</td>
                <td class="pr-6 text-gray-300">{{ $tour->name }}</td>
                <td class="font-bold pr-4 text-gray-400">Adults:</td>
                <td class="text-gray-300">{{ $tour->adult_people }}</td>
            </tr>
            <tr>
                <td class="font-bold pr-4 text-gray-400">Phone:</td>
                <td class="pr-6 text-gray-300">{{ $tour->phone }}</td>
                <td class="font-bold pr-4 text-gray-400">Kids:</td>
                <td class="text-gray-300">{{ $tour->kids_people ?? 0 }}</td>
            </tr>
            <tr>
                <td class="font-bold pr-4 text-gray-400">Email:</td>
                <td class="pr-6 text-gray-300">{{ $tour->email }}</td>
                <td class="font-bold pr-4 text-gray-400">From:</td>
                <td class="text-gray-300">{{ optional($tour->date_from)->format('Y-m-d') ?? '-' }}</td>
            </tr>
            <tr>
                <td class="font-bold pr-4 text-gray-400">Country:</td>
                <td class="pr-6 text-gray-300">{{ $tour->country ?? '-' }}</td>
                <td class="font-bold pr-4 text-gray-400">To:</td>
                <td class="text-gray-300">{{ optional($tour->date_to)->format('Y-m-d') ?? '-' }}</td>
            </tr>
            <tr>
                <td class="font-bold pr-4 text-gray-400">From City:</td>
                <td class="pr-6 text-gray-300">{{ $tour->from_city ?? '-' }}</td>
                <td class="font-bold pr-4 text-gray-400">Type:</td>

                    @php
                        $stylesType = match ($tour->type) {
                            'public' => 'color: #E79803;',
                            'custom' => 'color: #0494DE;',

                        };
                    @endphp
                <td class="text-gray-300" style="{{$stylesType}}">{{ ucfirst($tour->type) }}</td>
            </tr>
            <tr>
                <td class="font-bold pr-4 text-gray-400">To City:</td>
                <td class="pr-6 text-gray-300">{{ $tour->to_city ?? '-' }}</td>
                <td class="font-bold pr-4 text-gray-400">Status:</td>
                <td class="">
                    @php
                        $styles = match ($tour->status) {
                            'pending' => 'background-color: #e5e7eb; color: #374151;',
                            'approved' => 'background-color: #dbeafe; color: #1e40af;',
                            'done' => 'background-color: #d1fae5; color: #065f46;',
                            'cancelled' => 'background-color: #fee2e2; color: #991b1b;',
                            default => 'background-color: #f3f4f6; color: #1f2937;',
                        };
                    @endphp
                    <span class="inline-flex items-center rounded-full px-2 py-0.5 text-xs font-medium" style="{{ $styles }}">
                        {{ ucfirst($tour->status) }}
                    </span>

                </td>
            </tr>
        </tbody>
    </table>

    {{-- Message Section --}}
    <div class="text-sm text-gray-300">
        <strong>Message:</strong><br>
        {{ $tour->message ?? '-' }}
    </div>
</div>

</div>

