<?php 

namespace Options_lib\Fields;

defined('BASEPATH') or exit('Access Denied.');

class Color extends Base {
    protected function value() {
        return \Options_lib\FormValidator::GetValue(
            $this->key,
            $this->dom['value']
        );
    }

    public function render() {
        $this->dom['classes'][] = 'color-control float-end';
        if( $this->error )
            $this->dom['classes'][] = 'is-invalid';

        $attrs = [];
        foreach($this->dom['attributes'] as $key => $val) {
            $attrs[] = $key . ($val ? '="' . $val . '"' : '');
        }

        ?>
            <div class="py-2 form-group">
                <div class="d-flex justify-content-between">
                    <label class="form-label">
                        <?php echo $this->field['label']; ?>
                    </label>
                    <?php if( $this->error ) { ?>
                        <small class="text-danger text-align-right"><?php echo $this->error ?></small>
                    <?php } ?>
                </div>
                <input value="<?php echo $this->value() ?>" class="<?php echo join( ' ', $this->dom['classes'] ); ?>" id="<?php echo $this->dom['id']; ?>" type="color" name="key-<?php echo $this->key; ?>" placeholder="<?php echo $this->dom['placeholder']; ?>" <?php echo join(' ', $attrs); ?> />
                <small class="text-muted"><?php echo $this->field['description'] ?></small>
            </div>
        <?php
    }

    public function repeater_render() {
        $this->dom['classes'][] = 'color-control float-end';
        if( $this->error )
            $this->dom['classes'][] = 'is-invalid';


        $attrs = [];
        foreach($this->dom['attributes'] as $key => $val) {
            $attrs[] = $key . ($val ? '="' . $val . '"' : '');
        }
    
        ?>
            <div class="py-2 form-group">
                <div class="d-flex justify-content-between">
                    <label class="form-label">
                        <?php echo $this->field['label']; ?>
                    </label>
                    <template x-if="data.errors && data.errors['<?php echo $this->key ?>-' + index]">
                        <small x-text="data.errors['<?php echo $this->key ?>-' + index]" class="text-danger text-align-right"></small>
                    </template>
                </div>
                <input x-model="data.items[index]['<?php echo $this->key ?>']" x-bind:class="(data.errors && data.errors['<?php echo $this->key ?>-' + index]) && 'is-invalid'" :value="item['<?php echo $this->key ?>'] ? item['<?php echo $this->key ?>'] : data.fields['<?php echo $this->key ?>'].default" class="<?php echo join( ' ', $this->dom['classes'] ); ?>" :id="'<?php echo $this->dom['id']; ?>' + '-' + index" type="color" :name="'key-<?php echo $this->repeater['key'] ?>[' + index + '][<?php echo $this->key ?>]'" placeholder="<?php echo $this->dom['placeholder']; ?>" <?php echo join(' ', $attrs); ?> />
                <small class="text-muted"><?php echo $this->field['description'] ?></small>
            </div>
        <?php
    }
}