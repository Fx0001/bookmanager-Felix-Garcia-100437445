<form method="POST">
    <div class="form-group">
        <label>Título *</label>
        <input type="text" name="titulo" class="form-control"
               value="<?= htmlspecialchars($titulo['titulo'] ?? '') ?>">
    </div>
    <div class="form-group">
        <label>ISBN</label>
        <input type="text" name="isbn" class="form-control"
               value="<?= htmlspecialchars($titulo['isbn'] ?? '') ?>">
    </div>
    <div class="form-group">
        <label>Descripción</label>
        <textarea name="descripcion" class="form-control" rows="3"><?= htmlspecialchars($titulo['descripcion'] ?? '') ?></textarea>
    </div>
    <div class="form-group">
        <label>Editorial</label>
        <select name="id_publicador" class="form-control">
            <option value="">-- Sin editorial --</option>
            <?php foreach ($publicadores as $p): ?>
                <option value="<?= $p['id_publicador'] ?>"
                    <?= ($titulo['id_publicador'] ?? '') == $p['id_publicador'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($p['nombre']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label>Precio *</label>
            <input type="number" step="0.01" name="precio" class="form-control"
                   value="<?= htmlspecialchars($titulo['precio'] ?? '0') ?>">
        </div>
        <div class="form-group col-md-4">
            <label>Stock *</label>
            <input type="number" name="stock" class="form-control"
                   value="<?= htmlspecialchars($titulo['stock'] ?? '0') ?>">
        </div>
        <div class="form-group col-md-4">
            <label>Fecha de publicación</label>
            <input type="date" name="fecha_publicacion" class="form-control"
                   value="<?= htmlspecialchars($titulo['fecha_publicacion'] ?? '') ?>">
        </div>
    </div>

    <button type="submit" class="btn btn-primary"><?= $textoBoton ?></button>
    <a href="index.php" class="btn btn-secondary">Cancelar</a>
</form>