<div class="container">
    <div class="alert alert-success d-flex align-items-center" role="alert">
        Un e-mail vient de vous être envoyé !
    </div>
    <!-- A revoir, pas encore terminé ! -->
    <div class="card-body">
        <form method="POST">
            <div class="form-floating">
                <input type="number" class="form-control" name="code" pattern="[0-9]{6}" placeholder="code" title="code à 6 chiffres" required>
                <label for="floatingPassword">Code*</label>
                <span class="validity"></span>
            </div>
            <button type="submit" class="btn btn-primary btn-block mt-3">Confirmer le code</button>
        </form>
    </div>
</div>
<style>
input:invalid {
  border: red solid 3px;
}
</style>