            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                <div class="select-top-header select-tabs">
                    <?php 
                        $active = false;
                    ?>
                    <?php if (wpblog_theme_option('header-switch-1') && wpblog_theme_option('header-office-1')): ?>
                        <input  id="select-top-header-option0" 
                                type="radio"
                                name="option"
                                value="0"
                                tabindex="0"
                                <?php 
                                if (!$active) {
                                    echo 'checked="checked"';
                                    $active = true;
                                    }
                                ?>
                                data-target="#office1"
                                class="select-top-header-input"/>
                    <?php endif; ?>
                    <?php if (wpblog_theme_option('header-switch-2') && wpblog_theme_option('header-office-2')): ?>
                        <input  id="select-top-header-option1" 
                                type="radio"
                                name="option"
                                value="1"
                                tabindex="0"
                                <?php 
                                if (!$active) {
                                    echo 'checked="checked"';
                                    $active = true;
                                    }
                                ?>
                                data-target="#office2"
                                class="select-top-header-input"/>
                    <?php endif; ?>
                    <?php if (wpblog_theme_option('header-switch-3') && wpblog_theme_option('header-office-3')): ?>
                        <input  id="select-top-header-option2" 
                                type="radio"
                                name="option"
                                value="2"
                                tabindex="0"
                                <?php 
                                if (!$active) {
                                    echo 'checked="checked"';
                                    $active = true;
                                    }
                                ?>
                                data-target="#office3"
                                class="select-top-header-input"/>
                    <?php endif; ?>
                    <?php if (wpblog_theme_option('header-switch-4') && wpblog_theme_option('header-office-4')): ?>
                        <input  id="select-top-header-option3" 
                                type="radio"
                                name="option"
                                value="3"
                                tabindex="0"
                                <?php 
                                if (!$active) {
                                    echo 'checked="checked"';
                                    $active = true;
                                    }
                                ?>
                                data-target="#office4"
                                class="select-top-header-input"/>
                    <?php endif; ?>
                    <?php if (wpblog_theme_option('header-switch-5') && wpblog_theme_option('header-office-5')): ?>
                        <input  id="select-top-header-option4" 
                                type="radio"
                                name="option"
                                value="4"
                                tabindex="0"
                                <?php 
                                if (!$active) {
                                    echo 'checked="checked"';
                                    $active = true;
                                    }
                                ?>
                                data-target="#office5"
                                class="select-top-header-input"/>
                    <?php endif; ?>
                    <div tabindex="0" class="select-top-header-toggle select-top-header-toggle_type_open"></div>
                    <div tabindex="0" class="select-top-header-toggle select-top-header-toggle_type_close"></div>
                    <div tabindex="0" class="select-top-header-options">
                        <?php if (wpblog_theme_option('header-switch-1') && wpblog_theme_option('header-office-1')): ?>
                            <label for="select-top-header-option0" class="select-top-header-option" data-target="#office1">
                                <?php echo esc_html(wpblog_theme_option('header-office-1')); ?>
                            </label>
                        <?php endif; ?>

                        <?php if (wpblog_theme_option('header-switch-2') && wpblog_theme_option('header-office-2')): ?>
                            <label for="select-top-header-option1" class="select-top-header-option" data-target="#office2">
                                <?php echo esc_html(wpblog_theme_option('header-office-2')); ?>
                            </label>
                        <?php endif; ?>

                        <?php if (wpblog_theme_option('header-switch-3') && wpblog_theme_option('header-office-3')): ?>
                            <label for="select-top-header-option2" class="select-top-header-option" data-target="#office3">
                                <?php echo esc_html(wpblog_theme_option('header-office-3')); ?>
                            </label>
                        <?php endif; ?>

                        <?php if (wpblog_theme_option('header-switch-4') && wpblog_theme_option('header-office-4')): ?>
                            <label for="select-top-header-option3" class="select-top-header-option" data-target="#office4">
                                <?php echo esc_html(wpblog_theme_option('header-office-4')); ?>
                            </label>
                        <?php endif; ?>

                        <?php if (wpblog_theme_option('header-switch-5') && wpblog_theme_option('header-office-5')): ?>
                            <label for="select-top-header-option4" class="select-top-header-option" data-target="#office5">
                                <?php echo esc_html(wpblog_theme_option('header-office-5')); ?>
                            </label>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="offices-wrap">
                    <?php wpblog_theme_get_header_wrap(); ?>
                </div>
            </div>