 <!--start blog sidebar-->
 <div class="col-md-4">
     <div class="blog-sidebar">
         <!--start widget single-->
         <div class="sidebar-widget">
             <h4>Tìm kiếm</h4>
             <form>
                 <div class="widget-serch form-group">
                     <input type="hidden" name="group" value="{{ isset($_GET['group']) ? $_GET['group'] : '' }}">
                     <input type="text" class="form-control" value="{{ isset($_GET['search']) ? $_GET['search'] : '' }}"
                         name="search" placeholder="Tìm bài viết ...">
                     <button type="submit"><i class="fa fa-search"></i></button>
                 </div>
             </form>
         </div>
         <!--end widget single-->
         <!--start widget single-->
         <div class="sidebar-widget">
             <h4>Danh mục bài viết</h4>
             <ul>
                 @foreach ($data['groups'] as $item)
                     <li>
                         <a href="{{ route('blog') }}?group={{ $item->slug }}" class="d-flex justify-content-between">
                             {{ $item->name }}<span>({{ $item->blogs_count }})</span>
                         </a>
                     </li>
                 @endforeach
             </ul>
         </div>
         <!--end widget single-->
     </div>
 </div>
 <!--end blog sidebar-->
