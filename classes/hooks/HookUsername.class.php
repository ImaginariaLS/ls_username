<?php

class PluginUsername_HookUsername extends Hook
{

    public function RegisterHook()
    {
        $this->AddHook('template_html_head_end', 'UserName');
    }

    public function UserName()
    {
        $sSelector = 'body *';
        if (Config::Get('plugin.username.article')) {
            $sSelector = '.topic-content';
        }
        if ($this->User_IsAuthorization()) {
            $this->Viewer_Assign('sSelector', $sSelector);
            return $this->Viewer_Fetch(Plugin::GetTemplatePath(__CLASS__) . 'username.tpl');
        }
    }
}

