<div style="margin-bottom: 10px;">
    <label for="{{ $formField }}">{{ $labelText  }}:</label><br>
    <input type="{{ $inputType  }}" name="{{ $formField }}" id="{{ $formField  }}" value="{{ old($formField, $inputValueOld) }}" required>
</div>
