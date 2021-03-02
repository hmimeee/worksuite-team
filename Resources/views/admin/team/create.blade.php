<link rel="stylesheet" href="{{ asset('plugins/bower_components/switchery/dist/switchery.min.css') }}">

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title">Create Team</h4>
</div>
<div class="modal-body">
    <div class="portlet-body">
        {!! Form::open(['id'=>'createTeamForm','class'=>'ajax-form','method'=>'POST']) !!}
        
            <div class="form-body">
                <div class="form-group">
                    <label class="required">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name"/>
                </div>
                
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description" placeholder="Description" rows="5"></textarea>
                </div>

                {{-- <div class="form-group">
                    <label class="required">
                        Icon Name
                        <a class="mytooltip font-12" href="javascript:void(0)">
                            <i class="fa fa-info-circle"></i>
                            <span class="tooltip-content5">
                                <span class="tooltip-text3">
                                    <span class="tooltip-inner2">
                                        Fontawesome.com icon name, for example instead of "fa-user", use only "user" as the icon name
                                    </span>
                                </span>
                            </span>
                        </a>
                    </label>
                    <a target="_blank" class="m-l-5" href="https://fontawesome.com">
                        Check <i class="fa fa-external-link" title="fontawesome.com"></i>
                    </a>

                    <input type="text" class="form-control" name="fa_icon" placeholder="Fontawesome icon name"/>
                </div> --}}

                <div class="form-group">
                    <label style="display: block;">Status</label>
                    <div class="switchery-demo">
                        <input type="checkbox" name="status" value="1" class="js-switch" data-color="#00c292" data-secondary-color="#f96262" />
                    </div>
                </div>

                <div class="form-actions">
                    <button class="btn btn-success">
                        <i class="fa fa-check"></i> Save
                    </button>
                </div>
            </div>

        {!! Form::close() !!}
    </div>
</div>

<script src="{{ asset('plugins/bower_components/switchery/dist/switchery.min.js') }}"></script>
<script>
     // Switchery
     var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    $('.js-switch').each(function () {
        new Switchery($(this)[0], $(this).data());
    });

    $('#createTeamForm').submit(function (e) {
        e.preventDefault();
        $.easyAjax({
            url: "{{route('admin.team.store')}}",
            container: '#createTeamForm',
            type: "POST",
            data: $(this).serialize(),
            success: function(res){
                if(res.status =='success'){
                    $('#teamModal').modal('hide');
                    location.reload(true);
                }
            }
        })
    });
</script>