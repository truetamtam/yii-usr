<?php /*
@var $this DefaultController
@var $model LoginForm */

$title = Yii::t('UsrModule.usr', 'Log in');
if (isset($this->breadcrumbs))
	$this->breadcrumbs=array($this->module->id, $title);
$this->pageTitle = Yii::app()->name.' - '.$title;
?>
<h2><?php echo $title; ?></h2>

<div class="<?php echo $this->module->formCssClass; ?>">
<?php $form=$this->beginWidget($this->module->formClass, array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'focus'=>array($model,'username'),
)); ?>

	<p class="note"><?php echo Yii::t('UsrModule.usr', 'Fields marked with <span class="required">*</span> are required.'); ?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="rememberMe control-group">
		<?php echo $form->label($model,'rememberMe', array('label'=>$form->checkBox($model,'rememberMe').$model->getAttributeLabel('rememberMe'), 'class'=>'checkbox')); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton(Yii::t('UsrModule.usr', 'Log in'), array('class'=>$this->module->submitButtonCssClass)); ?>
	</div>
<?php if ($this->module->recoveryEnabled): ?>
	<p>
		<?php echo Yii::t('UsrModule.usr', 'Don\'t remember username or password?'); ?>
		<?php echo Yii::t('UsrModule.usr', 'Go to {link}.', array(
			'{link}'=>CHtml::link(Yii::t('UsrModule.usr', 'password recovery'), array('/usr/recovery')),
		)); ?>
	</p>
<?php endif; ?>
<?php if ($this->module->registrationEnabled): ?>
	<p>
		<?php echo Yii::t('UsrModule.usr', 'Don\'t have an account yet?'); ?>
		<?php echo Yii::t('UsrModule.usr', 'Go to {link}.', array(
			'{link}'=>CHtml::link(Yii::t('UsrModule.usr', 'registration'), array('/usr/register')),
		)); ?>
	</p>
<?php endif; ?>

<?php $this->endWidget(); ?>
</div><!-- form -->
