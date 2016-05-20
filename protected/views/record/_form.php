<?php
/* @var $this RecordController */
/* @var $model Record */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'record-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'date1'); ?>
		<?php echo $form->textField($model,'date1'); ?>
		<?php echo $form->error($model,'date1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'odo'); ?>
		<?php echo $form->textField($model,'odo'); ?>
		<?php echo $form->error($model,'odo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total'); ?>
		<?php echo $form->textField($model,'total',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'total'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mileage'); ?>
		<?php echo $form->textField($model,'mileage',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'mileage'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'time'); ?>
		<?php echo $form->textField($model,'time'); ?>
		<?php echo $form->error($model,'time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comments'); ?>
		<?php echo $form->textField($model,'comments',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'comments'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->