
<?php
    $search = function($eachId,$return,$else="",$status=""){
        $menu = helper::getMenu();

        if($status == 'child')
        {
            $id = $menu->id;

        }else{
            if($menu->parent_id != null)
            {
                $id =  $menu->parent_id;
            }else{
                $id = $menu->id;
            }
        }
               

        return $eachId == $id ? $return : $else;
    };
?>
        <!-- MENU SECTION -->
       <div id="left" >
            <div class="media user-media well-small">
                <a class="user-link" href="#">
                    <img class="media-object img-thumbnail user-img" alt="User Picture" src="{{ asset(null) }}backend/assets/img/user.png" width="90%"/>
                </a>
                <br />
                <div class="media-body">
                    <h5 class="media-heading"> {{ getUser()->username }}</h5>
                    <ul class="list-unstyled user-info">
                        
                        <li>
                             <a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a> Online
                           
                        </li>
                       
                    </ul>
                </div>
                <br />
            </div>

            <ul id="menu" class="collapse">

                
            @foreach(injectModel('Menu')->whereParentId(null)->orderBy('order','asc')->get() as $row)

                <li class="panel {{ $search($row->id,'active') }}">

                    <a href="{{ ($row->controller != '#' ? urlBackend($row->slug.'/index') : 'javascript:void(0)') }}" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav{{$row->id}}">
                        <i class="icon-folder-{{ $search($row->id,'open','close') }}-alt" aria-hidden="true"></i> {{ $row->title }}
       
                       @if(!empty($row->childs->first()->id))
                        <span class="pull-right">
                          <i class="icon-angle-left"></i>
                        </span>
                        @endif
                    </a>   

                    @if(!empty($row->childs->first()->id))
                    <ul class="collapse {{ $search($row->id,'in') }}" id="component-nav{{$row->id}}">
                        
                        @foreach($row->childs as $child)
                        <li class="">
                            <a href="{{ urlBackend($child->slug.'/index') }}">
                                <i class="icon-angle-right"></i> {{ $child->title}} 
                            </a>
                        </li>
                        @endforeach
                    </ul>   
                    @endif             
                </li>
            @endforeach
                <li><a target="_blank" href="{{ url('/') }}">GO TO WEB</a></li>
            </ul>

        </div>
        <!--END MENU SECTION -->