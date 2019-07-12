@if($emp)
    @foreach($emp as $e)
        <tr class="removeaddedtr">
            <td><div class="input"><input type="text" class="delAllTY2val" name="name[]" id="name" value="{{$e->name}}"></div></td>
            <td width="75">
                <div class="input">
                    @if($e->sex == "Male")
                        <select name="sex[]" id="name" class="delAllTY2val dropdown-wrap">
                            <option value="Male" selected="selected" >Male</option>
                            <option value="Female">Female</option>
                        </select>
                    @else
                        <select name="sex[]" id="name" class="delAllTY2val dropdown-wrap">
                            <option value="Male">Male</option>
                            <option value="Female" selected="selected" >Female</option>
                        </select>
                    @endif
                </div>
            </td>
            <td>
                <div class="input">
                    <input type="text" class="delAllTY2val" name="icno[]" id="name" value="{{$e->ic_number}}">
                </div>
            </td>
            <td onclick="deleteCurTr(this)" align="center">X</td>
        </tr>
    @endforeach    
@endif

<tr>
    <td><div class="input"><input type="text" class="delAllTY2val" name="name[]" id="name" value=""></div></td>
    <td width="75">
        <div class="input">
              <select name="sex[]" id="name" class="delAllTY2val dropdown-wrap" >
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
              </select> 
        </div>
    </td>
    <td><div class="input"><input type="text" class="delAllTY2val" name="icno[]" id="name" value=""></div></td>
    <td align="center"></td>
</tr>