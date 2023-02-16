<template>
<div class="modal" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary"><strong>Error!</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-primary">
        <p><strong>El numero de expediente es requerido.</strong></p>
      </div>
      <div class="modal-footer ">
        <button type="button" class="btn btn-secondary bg-primary text-white" data-dismiss="modal">Salir</button>
        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>
</template>
<script>
export default {
    methods: {
        getTransition(){
            console.log('transition');
        }
    },
    mounted() {

    },
}
</script>
