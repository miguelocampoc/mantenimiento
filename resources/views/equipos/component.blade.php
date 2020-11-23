<button type="button"  @click="btninsert()" class="btn btn-primary">+</button>
    <br><br>

<table id="table_id" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
             <th>id</th>
            <th>integrante1</th>
            <th>integrante2</th>
            <th>integrante3</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody >
        @verbatim

       <tr v-for="equipo of equipos" >
          <td>{{equipo.id}}</td>
          <td>{{equipo.integrante1}}</td>
          <td>{{equipo.integrante2}}</td>
          <td>{{equipo.integrante3}}</td>
          <td><button type="button " @click="btneditar(equipo.id,equipo.integrante1,equipo.integrante2,equipo.integrante3)" class="btn btn-primary">editar</button> <button type="button " @click="btndrop(equipo.id)" class="btn btn-primary">drop</button></td>

       </tr>
    </tbody>
    @endverbatim

</table>