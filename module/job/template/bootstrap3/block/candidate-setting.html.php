{if $aCurrentCandidate && $aCurrentCandidate.candidate_id}
<script>
{literal}
$Behavior.initCandidateSetting = function(){
    $('.setting_content a').each(function(){
        if (window.location.href === $(this).attr('href')) $(this).addClass('active');
    });
}
{/literal}
</script>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><i class="icon-cogs"></i> {phrase var='job.resume'}</h3>
  </div>
  <ul class="list-group">
    <li class="list-group-item"><a href="{url link='job.candidate.resume'}">{phrase var='job.manage_resumes'}</a></li>
    <li class="list-group-item"><a href="{url link='job.candidate.resume.add'}">{phrase var='job.add_resume'}</a></li>
  </ul>
</div>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><i class="icon-cogs"></i> {phrase var='job.jobs'}</h3>
  </div>
  <ul class="list-group">
    <li class="list-group-item"><a href="{url link='job.candidate.following-company'}">{phrase var='job.following_company'}</a></li>
    <li class="list-group-item"><a href="{url link='job.candidate.following-jobs'}">{phrase var='job.following_jobs'}</a></li>
    <li class="list-group-item"><a href="{url link='job.candidate.saved-jobs'}">{phrase var='job.saved_jobs'}</a></li>
    <li class="list-group-item"><a href="{url link='job.candidate.notification'}">{phrase var='job.notifications'}</a>{if $iNotificationCount > 0}<span class="notification_unread">{$iNotificationCount}</span>{/if}</li>
  </ul>
</div>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><i class="icon-cogs"></i> {phrase var='job.settings'}</h3>
  </div>
  <ul class="list-group">
    <li class="list-group-item"><a href="{url link='job.candidate.setting'}">{phrase var='job.privacy_settings'}</a></li>
    <li class="list-group-item"><a href="{url link='job.candidate.setup'}">{phrase var='job.edit_profile'}</a></li>
  </ul>
</div>

{/if}