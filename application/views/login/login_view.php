<div class="entry">
 <?php echo validation_errors(); ?>
 <?php echo form_open('verifylogin'); ?>
 <div align="center">
 <fieldset style="width: 175px; border:6px groove #ccc; background:#eef9ff;">
 <legend style="font-weight:bold; color:#303742; font-size: 18px;">Ingresar al Sistema</legend>
 <label for="username">Cedula:</label>
 <input type="text" size="20" id="username" name="username"/>
 <br/>
      <label for="password">Contraseña:</label>
      <input type="password" size="20" id="passowrd" name="password"/>
      <br/>
      <input type="submit" value="Login" class="button"/>
  </form>
  </fieldset>
 </div>
</div>

