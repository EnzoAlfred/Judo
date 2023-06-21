<script type="text/javascript">
    function verif() {
        if (document.formSaisie.prixP.value > 0) {
            var fileElement = document.getElementById("file");
            var fileExtension = "";
            if (fileElement.value.lastIndexOf(".") > 0) {
                fileExtension = fileElement.value.substring(fileElement.value.lastIndexOf(".") + 1, fileElement.value.length);
            }
            if (fileExtension.toLowerCase() == "jpg" || fileExtension.toLowerCase() == "jpeg" || fileExtension.toLowerCase() == "pjpeg" || fileExtension.toLowerCase() == "jfif" || fileExtension.toLowerCase() == "pjp" || fileExtension.toLowerCase() == "png" || fileExtension.toLowerCase() == "svg" || fileExtension.toLowerCase() == "webp") {
                return true;
            } else {
                alert ("Veuillez sélectionner le bon type d'image");
                return false;
            }
        } else {
            alert("Le prix ne peux pas être inférieur à 1");
            return false;
        }
    }
</script>
<script type="text/javascript">
    function input(){
        $('#file').click();
    }
</script>
<script>
    $(document).ready(function (e) {
        $('#file').on('change', (e) => {
            console.log('change file');
            let that = e.currentTarget
            if (that.files && that.files[0]) {
                let reader = new FileReader()
                reader.onload = (e) => {
                    $('#preview').attr('src', e.target.result)
                }
                reader.readAsDataURL(that.files[0])
            }
        })
    });
 </script>
<h2>Ajout de produit</h2>
<div style="text-align: center; border: 3px solid #000000;border-radius: 10px; margin-right: 35%; margin-left: 35%;">
    <form method="POST" action="index.php?controleur=admin&action=verifPourAddProduit" enctype="multipart/form-data" name="formSaisie" onsubmit="return verif();">
        <p>Nom du produit : 
        <input type="text" name="nomP" placeholder="Saisir le nom du produit" title="Saisir un nom"/></p><br/>
        <p>Prix du produit : 
        <input type="number" name="prixP" id="prixP" value=1 title="Saisir un prix" /></p><br/>
        <div class="upload">
        <label>Image : </label>
        <p><img id="preview" /><input class="input-file" type="file" id="file" name="img" accept="image/jpg, image/jpeg, image/jfif, image/pjpeg, image/pjp, image/png, image/svg, image/webp"/></p><br/>
        <button type="button" onclick="input()" id="file-select-button">Choisir une image</button>
        </div>
        <p>Description : 
        <input type="text" name="descrP" title="Saisir une description" placeholder="La description"/></p><br/>
        <div>
        <button type="submit">Envoyer</button>
        <button type="reset">Annuler</button>
        </div><br/>
    </form>
</div><br/>
