@extends('layouts.adminmaster')
@section('admin_contents')
@if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: "{{ session('success')}}",
        });
    </script>
@endif

@push('scripts')
<script>
  const bulkActionUrl = "{{ route('iconmanagement.bulkAction') }}";
  const csrfToken = "{{ csrf_token() }}";
</script>
@endpush

<div class="card z-1 mb-3" id="recentPurchaseTable" data-list="{&quot;valueNames&quot;:[&quot;name&quot;,&quot;phone&quot;,&quot;product&quot;,&quot;payment&quot;,&quot;amount&quot;],&quot;page&quot;:8,&quot;pagination&quot;:true}">
    <div class="card-header">
      <div class="text-center pt-2 pb-2 ">
        <h4 class="fs-6">Database Records Management  </h4>  
      </div>
        {{-- search option  --}}
        <div class="searchess mb-4 ">
          <div class="row">
            <div class="col-md-12 ">
                <form action="" method="get">
                  <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                    <a href="{{route('iconmanagement.all')}}"><button class="btn btn-outline-primary" type="button">Reset</button></a>
                  </div>
                </form>
            </div>
            {{-- col end --}}
          </div>
          <!-- ক্যাটেগরি ডেটা টেবিল -->
        </div>
        {{-- search end  --}}

      <div class="row flex-between-center">
        <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
          <h5 class="fs-9 mb-0 text-nowrap py-2 py-xl-0"> Infomations </h5>
        </div>
        <div class="col-8 col-sm-auto ms-auto text-end ps-0">
          <div class="d-none" id="table-purchases-actions">
            <div class="d-flex">
              <select class="form-select form-select-sm" id="bulk-action-select">
                <option selected disabled>Bulk actions</option>
                <option value="active">Active</option>
                <option value="deactive">Deactive</option>
                <option value="delete">Delete</option>
                
              </select>
              <button class="btn btn-falcon-default btn-sm ms-2" id="bulk-apply-btn" type="button">Apply</button>
            </div>
          </div>
          

          <div id="table-purchases-replace-element" class="d-flex align-items-center">
              <!-- New Button -->
            <a href="javascript::voied(0)">
              <button class="btn btn-falcon-default btn-sm mx-2" type="button" data-bs-toggle="modal" data-bs-target="#iconModal">
              <i class="bi bi-eye"></i>
                <span class="d-none d-sm-inline-block ms-1"></span>
              </button>
            </a>
            <a href="{{route('iconmanagement.icon.seeder.run')}}" onclick="return confirm('Are you sure you want to import all icons from System ?')">
              <button class="btn btn-falcon-default btn-sm mx-2" type="button">
              <i class="bi bi-database-fill-add"></i>
                <span class="d-none d-sm-inline-block ms-1"></span>
              </button>
            </a>
           
            <a href="{{route('iconmanagement.add')}}">
              <button class="btn btn-falcon-default btn-sm" type="button">
                <i class="fas fa-plus"></i>
                <span class="d-none d-sm-inline-block ms-1">New</span>
              </button>
            </a>

              <!-- Filter Button -->
            <a href="{{route('iconmanagement.recycle')}}">
              <button class="btn btn-falcon-default btn-sm mx-2" type="button">
                <i class="fas fa-recycle"></i>
                <span class="d-none d-sm-inline-block ms-1">Recycle</span>
              </button>
            </a>

              <!-- Export Button -->
           
              <div class="dropdown">
                <button class="btn btn-falcon-default btn-sm dropdown-toggle d-flex align-items-center" type="button" id="exportDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fas fa-external-link-alt"></i>
                  <span class="d-none d-sm-inline-block ms-1">Export</span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="exportDropdown">
                  <li><a class="dropdown-item" href="{{route('iconmanagement.export_pdf')}}">Export as PDF</a></li>
                  <li><a class="dropdown-item" href="{{route('iconmanagement.export_excel')}}">Export as Excel</a></li>
                  <li><a class="dropdown-item" href="{{route('iconmanagement.export_csv')}}">Export as CSV</a></li>
                  <li><a class="dropdown-item" href="{{route('iconmanagement.export_zip')}}">Export as Zip</a></li>
                </ul>
              </div>
              
           
              
          </div>
        </div>

      </div>
    </div>

    <div class="card-body px-0 py-0">
      <div class="table-responsive scrollbar">

        <table class="table table-sm fs-10 mb-0 overflow-hidden">
          <thead class="bg-200">
            <tr class="">
              <th class="white-space-nowrap">
                <div class="form-check mb-0 d-flex align-items-center">
                  <input class="form-check-input" id="checkbox-bulk-purchases-select" type="checkbox" data-bulk-select="{&quot;body&quot;:&quot;table-purchase-body&quot;,&quot;actions&quot;:&quot;table-purchases-actions&quot;,&quot;replacedElement&quot;:&quot;table-purchases-replace-element&quot;}">
                </div>
              </th>
           
              <th class="text-900 sort pe-1 align-middle white-space-nowrap" data-sort="des">Icon</th>
              <th class="text-900 sort pe-1 align-middle white-space-nowrap" data-sort="des">Class</th>
              <th class="text-900 sort pe-1 align-middle white-space-nowrap " data-sort="time">Created At </th>
              <th class="text-900 sort pe-1 align-middle white-space-nowrap " data-sort="name">Creator</th>
              <th class="no-sort pe-1 align-middle data-table-row-action text-center">Manage</th>
            </tr>
          </thead>
          <tbody class="list" id="table-purchase-body">
            @foreach ($all as $data)
            <tr class="btn-reveal-trigger">
              <td class="align-middle" style="width: 28px;">
                <div class="form-check mb-0">
                  <input class="form-check-input" type="checkbox" data-bulk-select-row value="{{ $data->id }}">
                </div>
              </td>
              <td class="align-middle white-space-nowrap phone"><span><i class="{{$data->icons}}"></i></span> </td>
              
              <td class="align-middle white-space-nowrap phone">{{$data->icons}}</td>
              <td class="align-middle white-space-nowrap product">{{ $data->created_at->format('d M, Y - h:i A') }}</td>
              <td class="align-middle white-space-nowrap product">{{ $data->creator->name ?? "name" }} </td>
             
              <td class="align-middle white-space-nowrap text-end">
                <div class="dropstart font-sans-serif position-static d-inline-block">
                  <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal float-end"
                          type="button" id="dropdown-recent-purchase-table-0"data-bs-toggle="dropdown"data-boundary="window"aria-haspopup="true"aria-expanded="false"data-bs-reference="parent">
                    <i class="fas fa-ellipsis-h fs-10"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-recent-purchase-table-0">
                    <a class="dropdown-item" href="{{route('iconmanagement.view',$data->id)}}">View</a>
                    <a class="dropdown-item" href="{{route('iconmanagement.edit',$data->id)}}">Edit</a>
                    <!-- Hidden form to submit DELETE request -->
                    <form id="deleteForm{{ $data->id }}" action="{{ route('iconmanagement.softdelete', $data->id) }}" method="POST" style="display: none;">
                      @csrf
                      @method('DELETE')
                    </form>
                    <!-- Link to trigger the delete action -->
                    <a href="javascript:void(0);" class="dropdown-item text-danger" id="deleteButton{{ $data->id }}" data-id="{{ $data->id }}">Delete</a>

                    <div class="dropdown-divider"></div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#iconModal">
                      Pick an Icon
                    </button>
                 
                  </div>
                </div>
              </td>
            </tr>
            @endforeach

            {{-- tr end here  --}}

        </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer">
      <div class="row align-items-center">
        <div class="pagination d-none"><li class="active">
          <button class="page" type="button" data-i="1" data-page="8">1</button></li><li><button class="page" type="button" data-i="2" data-page="8">2</button></li></div>
        <div class="col">
          <p class="mb-0 fs-10">
            <span class="d-none d-sm-inline-block me-2" data-list-info="data-list-info">1 to 8 of 14</span>
            <span class="d-none d-sm-inline-block me-2">—</span>
            <a class="fw-semi-bold" href="#!" data-list-view="*">View all
           <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a></p>
        </div>
        <div class="col-auto d-flex"><button class="btn btn-sm btn-primary disabled" type="button" data-list-pagination="prev" disabled=""><span>Previous</span></button><button class="btn btn-sm btn-primary px-4 ms-2" type="button" data-list-pagination="next"><span>Next</span></button></div>
      </div>
    </div>
  </div>





<!-- Modal -->
<div class="modal fade" id="iconModal" tabindex="-1" aria-labelledby="iconModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="iconModalLabel">Select an Icon</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="d-flex flex-wrap" id="iconList" style="gap: 15px;">
          @foreach ($all as $icon)
            <div class="icon-item text-center" style="cursor:pointer;" onclick="selectIcon(' {{ $icon->icons  }}')">
              <i class="{{ $icon->icons }}" style="font-size: 24px;"></i>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>



<!-- Hidden input for storing selected icon -->
<input type="hidden" name="icon_class" id="selectedIconInput">

<!-- Selected icon preview -->
<!-- <div id="selectedIconPreview" class="mt-3" style="font-size: 30px;"></div>
<script>
    function selectIcon(iconClass) {
        document.getElementById('selectedIconInput').value = iconClass;
        document.getElementById('selectedIconPreview').innerHTML = `<i class="${iconClass}"></i>`;
        var myModal = bootstrap.Modal.getInstance(document.getElementById('iconModal'));
        myModal.hide();
    }
</script> -->


@endsection


