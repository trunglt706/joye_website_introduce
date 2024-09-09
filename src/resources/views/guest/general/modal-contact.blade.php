<!-- The Modal -->
<div class="modal fade" id="open-contact">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-header">
                <h5 class="modal-title">Đăng ký tư vấn</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('contact.create') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6 mb-2">
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Nhập họ tên *" required="">
                        </div>
                        <div class="form-group col-md-6 mb-2">
                            <input class="form-control" id="email" name="email" placeholder="Nhập Email *"
                                required="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mb-2">
                            <input class="form-control" id="phone" name="phone" placeholder="Nhập số ĐT *"
                                required="">
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <input class="form-control" id="service" name="service" placeholder="Dịch vụ cần tư vấn *"
                                required="">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <textarea class="form-control" id="comment" name="comment" rows="3" placeholder="Yêu cầu thêm (nếu có)"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary text-white">Đăng ký</button>
                </form>
            </div>
        </div>
    </div>
</div>
