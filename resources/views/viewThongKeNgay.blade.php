<form>
  <table>
    <tr>
      <th>Ngay</th>
      <th>Gio vao</th>
      <th>Gio ra</th>
      <th>So lan</th>
    </tr>
    @for($i = 1; $i <= $maxDate; $i++)
    @if(isset($thongKe[$i])) <tr>
      <td>
        {{$i}}
      </td>
      <td>
        {{$thongKe[$i]->max}}
      </td>
      <td>
        {{$thongKe[$i]->min}}
      </td>
      <td @php echo (($thongKe[$i]->count % 2 == 1) ? 'style="color:red"' : '') @endphp>{{$thongKe[$i]->count}}</td>
      </tr>
      @else
      <tr>
        <td>{{$i}}</td>
        <td>---</td>
        <td>---</td>
        <td>---</td>
      </tr>
      @endif
      @endfor
  </table>
</form>