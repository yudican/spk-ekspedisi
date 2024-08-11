<x-filament::table>
    <thead>
        <tr>
            <th>Alternative ID</th>
            @foreach ($data['criteriaIds'] as $criteriaId)
            <th>Criteria ID {{ $criteriaId }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($data['pivotData'] as $alternativeId => $attributes)
        <tr>
            <td>{{ $alternativeId }}</td>
            @foreach ($data['criteriaIds'] as $criteriaId)
            <td>{{ $attributes[$criteriaId] ?? '-' }}</td>
            @endforeach
        </tr>
        @endforeach
    </tbody>
</x-filament::table>