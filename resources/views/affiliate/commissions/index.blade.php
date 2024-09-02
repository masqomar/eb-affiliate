@extends('layouts.app')

@section('title', __('Dashboard'))

@section('content')
<div class="breadcrumb-with-buttons mb-24 flex-between flex-wrap gap-8">
    <div class="breadcrumb mb-24">
    </div>

    <div class="flex-align gap-8 flex-wrap">
        <div class="position-relative text-gray-500 flex-align gap-4 text-13">
            <span class="text-inherit">Sort by: </span>
            <div
                class="flex-align text-gray-500 text-13 border border-gray-100 rounded-4 ps-20 focus-border-main-600 bg-white">
                <span class="text-lg"><i class="ph ph-funnel-simple"></i></span>
                <select class="form-control ps-8 pe-20 py-16 border-0 text-inherit rounded-4 text-center">
                    <option value="1" selected>Popular</option>
                    <option value="1">Latest</option>
                    <option value="1">Trending</option>
                    <option value="1">Matches</option>
                </select>
            </div>
        </div>
        <div
            class="flex-align text-gray-500 text-13 border border-gray-100 rounded-4 ps-20 focus-border-main-600 bg-white">
            <span class="text-lg"><i class="ph ph-layout"></i></span>
            <select class="form-control ps-8 pe-20 py-16 border-0 text-inherit rounded-4 text-center"
                id="exportOptions">
                <option value="" selected disabled>Export</option>
                <option value="csv">CSV</option>
                <option value="json">JSON</option>
            </select>
        </div>
    </div>

</div>


<div class="card overflow-hidden">
    <div class="card-body p-0">
        <table id="assignmentTable" class="table table-striped">
            <thead>
                <tr>
                    <th class="h6 text-gray-300">No</th>
                    <th class="h6 text-gray-300">IP</th>
                    <th class="h6 text-gray-300">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($historyVisit['visits'] as $visit)
                <tr>
                    <td>
                        <span class="h6 mb-0 fw-medium text-gray-300">{{ $loop->iteration }}</span>
                    </td>
                    <td>
                        <span
                            class="text-13 py-2 px-8 bg-teal-50 text-teal-600 d-inline-flex align-items-center gap-8 rounded-pill">
                            <span class="w-6 h-6 bg-teal-600 rounded-circle flex-shrink-0"></span>
                            {{ $visit['data']['ip'] }}
                        </span>
                    </td>
                    <td>
                        <a href="#"
                            class="bg-main-50 text-main-600 py-2 px-14 rounded-pill hover-bg-main-600 hover-text-white">{{ $visit['created_at']->format('d-m-Y H:i') }}</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer flex-between flex-wrap">
        <span class="text-gray-900">Showing 1 to 10 of 12 entries</span>
        <ul class="pagination flex-align flex-wrap">
            <li class="page-item active">
                <a class="page-link h-44 w-44 flex-center text-15 rounded-8 fw-medium" href="#">1</a>
            </li>
            <li class="page-item">
                <a class="page-link h-44 w-44 flex-center text-15 rounded-8 fw-medium" href="#">2</a>
            </li>
            <li class="page-item">
                <a class="page-link h-44 w-44 flex-center text-15 rounded-8 fw-medium" href="#">3</a>
            </li>
            <li class="page-item">
                <a class="page-link h-44 w-44 flex-center text-15 rounded-8 fw-medium" href="#">...</a>
            </li>
            <li class="page-item">
                <a class="page-link h-44 w-44 flex-center text-15 rounded-8 fw-medium" href="#">8</a>
            </li>
            <li class="page-item">
                <a class="page-link h-44 w-44 flex-center text-15 rounded-8 fw-medium" href="#">9</a>
            </li>
            <li class="page-item">
                <a class="page-link h-44 w-44 flex-center text-15 rounded-8 fw-medium" href="#">10</a>
            </li>
        </ul>
    </div>
</div>
@endsection

@push('js')
<script>
    // ========================== Export Js Start ==============================
    document.getElementById('exportOptions').addEventListener('change', function() {
        const format = this.value;
        const table = document.getElementById('assignmentTable');
        let data = [];
        const headers = [];

        // Get the table headers
        table.querySelectorAll('thead th').forEach(th => {
            headers.push(th.innerText.trim());
        });

        // Get the table rows
        table.querySelectorAll('tbody tr').forEach(tr => {
            const row = {};
            tr.querySelectorAll('td').forEach((td, index) => {
                row[headers[index]] = td.innerText.trim();
            });
            data.push(row);
        });

        if (format === 'csv') {
            downloadCSV(data);
        } else if (format === 'json') {
            downloadJSON(data);
        }
    });

    function downloadCSV(data) {
        const csv = data.map(row => Object.values(row).join(',')).join('\n');
        const blob = new Blob([csv], {
            type: 'text/csv'
        });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'commisions.csv';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    }

    function downloadJSON(data) {
        const json = JSON.stringify(data, null, 2);
        const blob = new Blob([json], {
            type: 'application/json'
        });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'commisions.json';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    }
    // ========================== Export Js End ==============================

    // Table Header Checkbox checked all js Start
    $('#selectAll').on('change', function() {
        $('.form-check .form-check-input').prop('checked', $(this).prop('checked'));
    });

    // Data Tables
    new DataTable('#assignmentTable', {
        searching: false,
        lengthChange: false,
        info: false, // Bottom Left Text => Showing 1 to 10 of 12 entries
        paging: false,
        "columnDefs": [{
                "orderable": false,
                "targets": [0, 6]
            } // Disables sorting on the 7th column (index 6)
        ]
    });
</script>
@endpush