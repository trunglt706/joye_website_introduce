<div class="bl-form-contact">
    <div class="title-head">
        <h3>Đăng ký tư vấn miễn phí!</h3>
    </div>
    <form action="{{ route('v2.contact.create') }}" method="post">
        @csrf
        <div class="form-detail">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Họ và tên của bạn" name="name" required>
            </div>
            <div class="input-group">
                <input type="text" class="form-control" name="email" required
                    placeholder="Email hoặc số điện thoại">
            </div>
            <div class="input-group">
                <select name="group_id" required class="form-control form-select">
                    <option value="" class="first">
                        Chọn dịch vụ mà bạn quan tâm
                    </option>
                    @foreach (get_service_groups() as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-group">
                <textarea name="description" required class="form-control" rows="4" placeholder="Yêu cầu cụ thể (nếu có)"></textarea>
            </div>
            <br><br>
        </div>
        <h4 class="text-danger text-center mb-3 text-error"></h4>
        <div class="btn-submit">
            <button type="submit" class="btn">Đăng ký</button>
        </div>
    </form>
</div>
