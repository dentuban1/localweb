<?php 

namespace Options_lib\Fields;

defined('BASEPATH') or exit('Access Denied.');

class Switcher extends Base {
    protected function value() {
        return \Options_lib\FormValidator::GetCheckbox(
            $this->key,
            $this->dom['value']
        );
    }

    public function render() {
        $this->dom['classes'][] = 'form-check-input';

        $attrs = [];
        foreach($this->dom['attributes'] as $key => $val) {
            $attrs[] = $key . ($val ? '="' . $val . '"' : '');
        }

        ?>
            <div class="py-2 form-group">
                <div class="d-inline-flex justify-content-between">
                    <label for="<?php echo $this->dom['id'] ?>" class="form-label <?php if($this->error) { echo 'text-danger'; } ?>">
                        <?php echo $this->field['label'];
                        if($this->dom['tooltip']) { ?>
                            <svg x-init="new bootstrap.Popover($el)" style="width: 16px; height: 16px; outline: none; margin-left: 5px;" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" title="<?php echo is_array($this->dom['tooltip']) ? $this->dom['title'] : '' ?>" data-bs-content="<?php echo is_array($this->dom['tooltip']) ? $this->dom['tooltip']['content'] : $this->dom['tooltip'] ?>" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-help-circle"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                        <?php } ?>
                    </label>
                    <?php if( $this->error ) { ?>
                        <small class="text-danger text-align-right"><?php echo $this->error ?></small>
                    <?php } ?>
                </div>
                <div class="form-check form-switch form-switch-md float-end">
                    <input id="<?php echo $this->dom['id']; ?>" class="<?php echo join( ' ', $this->dom['classes'] ); ?>"  <?php echo $this->value() ?> name="key-<?php echo $this->key; ?>" type="checkbox" <?php echo join(' ', $attrs); ?>>
                </div>
                <small class="text-muted d-block"><?php echo $this->field['description'] ?></small>
            </div>
        <?php
    }

    public function repeater_render() {
        $this->dom['classes'][] = 'form-check-input';
        
        $attrs = [];
        foreach($this->dom['attributes'] as $key => $val) {
            $attrs[] = $key . ($val ? '="' . $val . '"' : '');
        }

        ?>
            <div class="py-2 form-group">
                <div class="d-flex justify-content-between">
                    <label x-bind:class="(data.errors && data.errors['<?php echo $this->key ?>-' + index]) && 'text-danger'" class="form-label">
                        <?php echo $this->field['label'];
                        if($this->dom['tooltip']) { ?>
                            <svg x-init="new bootstrap.Popover($el)" style="width: 16px; height: 16px; outline: none; margin-left: 5px;" data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover focus" title="<?php echo is_array($this->dom['tooltip']) ? $this->dom['title'] : '' ?>" data-bs-content="<?php echo is_array($this->dom['tooltip']) ? $this->dom['tooltip']['content'] : $this->dom['tooltip'] ?>" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-help-circle"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                        <?php } ?>
                    </label>
                    <template x-if="data.errors && data.errors['<?php echo $this->key ?>-' + index]">
                        <small x-text="data.errors['<?php echo $this->key ?>-' + index]" class="text-danger text-align-right"></small>
                    </template>
                </div>
                
                <div class="form-check form-switch form-switch-md float-end">
                    <input x-model="data.items[index]['<?php echo $this->key ?>']" value="checked" :id="'<?php echo $this->dom['id']; ?>' + '-' + index" class="<?php echo join( ' ', $this->dom['classes'] ); ?>" :checked="item['<?php echo $this->key ?>'] ? true : false" :name="'key-<?php echo $this->repeater['key'] ?>[' + index + '][<?php echo $this->key ?>]'" type="checkbox" <?php echo join(' ', $attrs); ?>>
                </div>

                <small class="text-muted"><?php echo $this->field['description'] ?></small>
            </div>
        <?php
    }

    public static function Validate($key, $field, $ci, $options) {
        if(strpos($key, '[') !== false) {
            $exp = explode('[', $key);
            $field = $exp[0];
            $index = str_replace(']', '', $exp[1]);
            $id    = str_replace(']', '', $exp[2]);

            return [
                'error' => false,
                'errors' => [],
                'value' => isset($_POST['key-'.$field][$index][$id]) ? true : false
            ];
        }

        return [
            'error' => false,
            'errors' => [],
            'value' => $ci->input->post('key-'.$key) ? true : false
        ];
    }
}