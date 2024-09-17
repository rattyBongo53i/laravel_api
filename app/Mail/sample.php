<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $customerName;
    public $items;
    public $totalAmount;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($customerName, $items, $totalAmount)
    {
        $this->customerName = $customerName;
        $this->items = $items;
        $this->totalAmount = $totalAmount;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.invoice')
                    ->subject('Your Invoice from ' . config('app.name'))
                    ->with([
                        'customerName' => $this->customerName,
                        'items' => $this->items,
                        'totalAmount' => $this->totalAmount,
                    ]);
    }

    public function datakojo(){
        /*
        --
-- Indexes for table `gibbonAction`
--
ALTER TABLE `gibbonAction`
  ADD PRIMARY KEY (`gibbonActionID`),
  ADD UNIQUE KEY `moduleActionName` (`name`,`gibbonModuleID`),
  ADD KEY `gibbonModuleID` (`gibbonModuleID`);

--
-- Indexes for table `gibbonActivity`
--
ALTER TABLE `gibbonActivity`
  ADD PRIMARY KEY (`gibbonActivityID`);

--
-- Indexes for table `gibbonActivityAttendance`
--
ALTER TABLE `gibbonActivityAttendance`
  ADD PRIMARY KEY (`gibbonActivityAttendanceID`);

--
-- Indexes for table `gibbonActivitySlot`
--
ALTER TABLE `gibbonActivitySlot`
  ADD PRIMARY KEY (`gibbonActivitySlotID`);

--
-- Indexes for table `gibbonActivityStaff`
--
ALTER TABLE `gibbonActivityStaff`
  ADD PRIMARY KEY (`gibbonActivityStaffID`),
  ADD KEY `gibbonActivityID` (`gibbonActivityID`,`gibbonPersonID`);

--
-- Indexes for table `gibbonActivityStudent`
--
ALTER TABLE `gibbonActivityStudent`
  ADD PRIMARY KEY (`gibbonActivityStudentID`),
  ADD KEY `gibbonActivityID` (`gibbonActivityID`,`status`);

--
-- Indexes for table `gibbonActivityType`
--
ALTER TABLE `gibbonActivityType`
  ADD PRIMARY KEY (`gibbonActivityTypeID`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `gibbonAdmissionsAccount`
--
ALTER TABLE `gibbonAdmissionsAccount`
  ADD PRIMARY KEY (`gibbonAdmissionsAccountID`),
  ADD UNIQUE KEY `gibbonPersonID` (`gibbonPersonID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `accessID` (`accessID`);

--
-- Indexes for table `gibbonAdmissionsApplication`
--
ALTER TABLE `gibbonAdmissionsApplication`
  ADD PRIMARY KEY (`gibbonAdmissionsApplicationID`),
  ADD KEY `foreignTable` (`foreignTable`,`foreignTableID`);

--
-- Indexes for table `gibbonAlarm`
--
ALTER TABLE `gibbonAlarm`
  ADD PRIMARY KEY (`gibbonAlarmID`);

--
-- Indexes for table `gibbonAlarmConfirm`
--
ALTER TABLE `gibbonAlarmConfirm`
  ADD PRIMARY KEY (`gibbonAlarmConfirmID`),
  ADD UNIQUE KEY `gibbonAlarmID` (`gibbonAlarmID`,`gibbonPersonID`);

--
-- Indexes for table `gibbonAlertLevel`
--
ALTER TABLE `gibbonAlertLevel`
  ADD PRIMARY KEY (`gibbonAlertLevelID`);

--
-- Indexes for table `gibbonApplicationForm`
--
ALTER TABLE `gibbonApplicationForm`
  ADD PRIMARY KEY (`gibbonApplicationFormID`);

--
-- Indexes for table `gibbonApplicationFormFile`
--
ALTER TABLE `gibbonApplicationFormFile`
  ADD PRIMARY KEY (`gibbonApplicationFormFileID`);

--
-- Indexes for table `gibbonApplicationFormLink`
--
ALTER TABLE `gibbonApplicationFormLink`
  ADD PRIMARY KEY (`gibbonApplicationFormLinkID`),
  ADD UNIQUE KEY `link` (`gibbonApplicationFormID1`,`gibbonApplicationFormID2`);

--
-- Indexes for table `gibbonApplicationFormRelationship`
--
ALTER TABLE `gibbonApplicationFormRelationship`
  ADD PRIMARY KEY (`gibbonApplicationFormRelationshipID`);

--
-- Indexes for table `gibbonAttendanceCode`
--
ALTER TABLE `gibbonAttendanceCode`
  ADD PRIMARY KEY (`gibbonAttendanceCodeID`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `nameShort` (`nameShort`);

--
-- Indexes for table `gibbonAttendanceLogCourseClass`
--
ALTER TABLE `gibbonAttendanceLogCourseClass`
  ADD PRIMARY KEY (`gibbonAttendanceLogCourseClassID`);

--
-- Indexes for table `gibbonAttendanceLogFormGroup`
--
ALTER TABLE `gibbonAttendanceLogFormGroup`
  ADD PRIMARY KEY (`gibbonAttendanceLogFormGroupID`);

--
-- Indexes for table `gibbonAttendanceLogPerson`
--
ALTER TABLE `gibbonAttendanceLogPerson`
  ADD PRIMARY KEY (`gibbonAttendanceLogPersonID`),
  ADD KEY `date` (`date`),
  ADD KEY `gibbonPersonID` (`gibbonPersonID`),
  ADD KEY `dateAndPerson` (`date`,`gibbonPersonID`) USING BTREE;

--
-- Indexes for table `gibbonBehaviour`
--
ALTER TABLE `gibbonBehaviour`
  ADD PRIMARY KEY (`gibbonBehaviourID`),
  ADD KEY `gibbonPersonID` (`gibbonPersonID`);

--
-- Indexes for table `gibbonBehaviourFollowUp`
--
ALTER TABLE `gibbonBehaviourFollowUp`
  ADD PRIMARY KEY (`gibbonBehaviourFollowUpID`),
  ADD KEY `gibbonBehaviourID` (`gibbonBehaviourID`);

--
-- Indexes for table `gibbonBehaviourLetter`
--
ALTER TABLE `gibbonBehaviourLetter`
  ADD PRIMARY KEY (`gibbonBehaviourLetterID`);

--
-- Indexes for table `gibbonCountry`
--
ALTER TABLE `gibbonCountry`
  ADD PRIMARY KEY (`printable_name`);

--
-- Indexes for table `gibbonCourse`
--
ALTER TABLE `gibbonCourse`
  ADD PRIMARY KEY (`gibbonCourseID`),
  ADD UNIQUE KEY `nameYear` (`gibbonSchoolYearID`,`name`),
  ADD KEY `gibbonSchoolYearID` (`gibbonSchoolYearID`);

--
-- Indexes for table `gibbonCourseClass`
--
ALTER TABLE `gibbonCourseClass`
  ADD PRIMARY KEY (`gibbonCourseClassID`),
  ADD KEY `gibbonCourseID` (`gibbonCourseID`);

--
-- Indexes for table `gibbonCourseClassMap`
--
ALTER TABLE `gibbonCourseClassMap`
  ADD PRIMARY KEY (`gibbonCourseClassMapID`),
  ADD UNIQUE KEY `gibbonCourseClassID` (`gibbonCourseClassID`);

--
-- Indexes for table `gibbonCourseClassPerson`
--
ALTER TABLE `gibbonCourseClassPerson`
  ADD PRIMARY KEY (`gibbonCourseClassPersonID`),
  ADD KEY `gibbonCourseClassID` (`gibbonCourseClassID`),
  ADD KEY `gibbonPersonID` (`gibbonPersonID`,`role`);

--
-- Indexes for table `gibbonCrowdAssessDiscuss`
--
ALTER TABLE `gibbonCrowdAssessDiscuss`
  ADD PRIMARY KEY (`gibbonCrowdAssessDiscussID`);

--
-- Indexes for table `gibbonCustomField`
--
ALTER TABLE `gibbonCustomField`
  ADD PRIMARY KEY (`gibbonCustomFieldID`);

--
-- Indexes for table `gibbonDataRetention`
--
ALTER TABLE `gibbonDataRetention`
  ADD PRIMARY KEY (`gibbonDataRetentionID`),
  ADD UNIQUE KEY `gibbonPersonID` (`gibbonPersonID`);

--
-- Indexes for table `gibbonDaysOfWeek`
--
ALTER TABLE `gibbonDaysOfWeek`
  ADD PRIMARY KEY (`gibbonDaysOfWeekID`),
  ADD UNIQUE KEY `name` (`name`,`nameShort`),
  ADD UNIQUE KEY `sequenceNumber` (`sequenceNumber`),
  ADD UNIQUE KEY `nameShort` (`nameShort`);

--
-- Indexes for table `gibbonDepartment`
--
ALTER TABLE `gibbonDepartment`
  ADD PRIMARY KEY (`gibbonDepartmentID`);

--
-- Indexes for table `gibbonDepartmentResource`
--
ALTER TABLE `gibbonDepartmentResource`
  ADD PRIMARY KEY (`gibbonDepartmentResourceID`);

--
-- Indexes for table `gibbonDepartmentStaff`
--
ALTER TABLE `gibbonDepartmentStaff`
  ADD PRIMARY KEY (`gibbonDepartmentStaffID`);

--
-- Indexes for table `gibbonDiscussion`
--
ALTER TABLE `gibbonDiscussion`
  ADD PRIMARY KEY (`gibbonDiscussionID`),
  ADD KEY `foreignTable` (`foreignTable`,`foreignTableID`),
  ADD KEY `gibbonPersonID` (`gibbonPersonID`);

--
-- Indexes for table `gibbonDistrict`
--
ALTER TABLE `gibbonDistrict`
  ADD PRIMARY KEY (`gibbonDistrictID`);

--
-- Indexes for table `gibbonEmailTemplate`
--
ALTER TABLE `gibbonEmailTemplate`
  ADD PRIMARY KEY (`gibbonEmailTemplateID`),
  ADD UNIQUE KEY `moduleTemplate` (`templateName`,`moduleName`) USING BTREE;

--
-- Indexes for table `gibbonExternalAssessment`
--
ALTER TABLE `gibbonExternalAssessment`
  ADD PRIMARY KEY (`gibbonExternalAssessmentID`);

--
-- Indexes for table `gibbonExternalAssessmentField`
--
ALTER TABLE `gibbonExternalAssessmentField`
  ADD PRIMARY KEY (`gibbonExternalAssessmentFieldID`),
  ADD KEY `gibbonExternalAssessmentID` (`gibbonExternalAssessmentID`);

--
-- Indexes for table `gibbonExternalAssessmentStudent`
--
ALTER TABLE `gibbonExternalAssessmentStudent`
  ADD PRIMARY KEY (`gibbonExternalAssessmentStudentID`),
  ADD KEY `gibbonExternalAssessmentID` (`gibbonExternalAssessmentID`),
  ADD KEY `gibbonPersonID` (`gibbonPersonID`);

--
-- Indexes for table `gibbonExternalAssessmentStudentEntry`
--
ALTER TABLE `gibbonExternalAssessmentStudentEntry`
  ADD PRIMARY KEY (`gibbonExternalAssessmentStudentEntryID`),
  ADD KEY `gibbonExternalAssessmentStudentID` (`gibbonExternalAssessmentStudentID`),
  ADD KEY `gibbonExternalAssessmentFieldID` (`gibbonExternalAssessmentFieldID`),
  ADD KEY `gibbonScaleGradeID` (`gibbonScaleGradeID`);

--
-- Indexes for table `gibbonFamily`
--
ALTER TABLE `gibbonFamily`
  ADD PRIMARY KEY (`gibbonFamilyID`);

--
-- Indexes for table `gibbonFamilyAdult`
--
ALTER TABLE `gibbonFamilyAdult`
  ADD PRIMARY KEY (`gibbonFamilyAdultID`),
  ADD KEY `gibbonFamilyID` (`gibbonFamilyID`,`contactPriority`),
  ADD KEY `gibbonPersonIndex` (`gibbonPersonID`);

--
-- Indexes for table `gibbonFamilyChild`
--
ALTER TABLE `gibbonFamilyChild`
  ADD PRIMARY KEY (`gibbonFamilyChildID`),
  ADD KEY `gibbonPersonIndex` (`gibbonPersonID`),
  ADD KEY `gibbonFamilyIndex` (`gibbonFamilyID`);

--
-- Indexes for table `gibbonFamilyRelationship`
--
ALTER TABLE `gibbonFamilyRelationship`
  ADD PRIMARY KEY (`gibbonFamilyRelationshipID`);

--
-- Indexes for table `gibbonFamilyUpdate`
--
ALTER TABLE `gibbonFamilyUpdate`
  ADD PRIMARY KEY (`gibbonFamilyUpdateID`),
  ADD KEY `gibbonFamilyIndex` (`gibbonFamilyID`,`gibbonSchoolYearID`);

--
-- Indexes for table `gibbonFileExtension`
--
ALTER TABLE `gibbonFileExtension`
  ADD PRIMARY KEY (`gibbonFileExtensionID`);

--
-- Indexes for table `gibbonFinanceBillingSchedule`
--
ALTER TABLE `gibbonFinanceBillingSchedule`
  ADD PRIMARY KEY (`gibbonFinanceBillingScheduleID`);

--
-- Indexes for table `gibbonFinanceBudget`
--
ALTER TABLE `gibbonFinanceBudget`
  ADD PRIMARY KEY (`gibbonFinanceBudgetID`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `nameShort` (`nameShort`);

--
-- Indexes for table `gibbonFinanceBudgetCycle`
--
ALTER TABLE `gibbonFinanceBudgetCycle`
  ADD PRIMARY KEY (`gibbonFinanceBudgetCycleID`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `gibbonFinanceBudgetCycleAllocation`
--
ALTER TABLE `gibbonFinanceBudgetCycleAllocation`
  ADD PRIMARY KEY (`gibbonFinanceBudgetCycleAllocationID`);

--
-- Indexes for table `gibbonFinanceBudgetPerson`
--
ALTER TABLE `gibbonFinanceBudgetPerson`
  ADD PRIMARY KEY (`gibbonFinanceBudgetPersonID`);

--
-- Indexes for table `gibbonFinanceExpense`
--
ALTER TABLE `gibbonFinanceExpense`
  ADD PRIMARY KEY (`gibbonFinanceExpenseID`);

--
-- Indexes for table `gibbonFinanceExpenseApprover`
--
ALTER TABLE `gibbonFinanceExpenseApprover`
  ADD PRIMARY KEY (`gibbonFinanceExpenseApproverID`);

--
-- Indexes for table `gibbonFinanceExpenseLog`
--
ALTER TABLE `gibbonFinanceExpenseLog`
  ADD PRIMARY KEY (`gibbonFinanceExpenseLogID`);

--
-- Indexes for table `gibbonFinanceFee`
--
ALTER TABLE `gibbonFinanceFee`
  ADD PRIMARY KEY (`gibbonFinanceFeeID`);

--
-- Indexes for table `gibbonFinanceFeeCategory`
--
ALTER TABLE `gibbonFinanceFeeCategory`
  ADD PRIMARY KEY (`gibbonFinanceFeeCategoryID`);

--
-- Indexes for table `gibbonFinanceInvoice`
--
ALTER TABLE `gibbonFinanceInvoice`
  ADD PRIMARY KEY (`gibbonFinanceInvoiceID`);

--
-- Indexes for table `gibbonFinanceInvoicee`
--
ALTER TABLE `gibbonFinanceInvoicee`
  ADD PRIMARY KEY (`gibbonFinanceInvoiceeID`);

--
-- Indexes for table `gibbonFinanceInvoiceeUpdate`
--
ALTER TABLE `gibbonFinanceInvoiceeUpdate`
  ADD PRIMARY KEY (`gibbonFinanceInvoiceeUpdateID`),
  ADD KEY `gibbonInvoiceeIndex` (`gibbonFinanceInvoiceeID`,`gibbonSchoolYearID`);

--
-- Indexes for table `gibbonFinanceInvoiceFee`
--
ALTER TABLE `gibbonFinanceInvoiceFee`
  ADD PRIMARY KEY (`gibbonFinanceInvoiceFeeID`);

--
-- Indexes for table `gibbonFirstAid`
--
ALTER TABLE `gibbonFirstAid`
  ADD PRIMARY KEY (`gibbonFirstAidID`);

--
-- Indexes for table `gibbonFirstAidFollowUp`
--
ALTER TABLE `gibbonFirstAidFollowUp`
  ADD PRIMARY KEY (`gibbonFirstAidFollowUpID`),
  ADD KEY `gibbonFirstAidID` (`gibbonFirstAidID`);

--
-- Indexes for table `gibbonForm`
--
ALTER TABLE `gibbonForm`
  ADD PRIMARY KEY (`gibbonFormID`);

--
-- Indexes for table `gibbonFormField`
--
ALTER TABLE `gibbonFormField`
  ADD PRIMARY KEY (`gibbonFormFieldID`);

--
-- Indexes for table `gibbonFormGroup`
--
ALTER TABLE `gibbonFormGroup`
  ADD PRIMARY KEY (`gibbonFormGroupID`);

--
-- Indexes for table `gibbonFormPage`
--
ALTER TABLE `gibbonFormPage`
  ADD PRIMARY KEY (`gibbonFormPageID`);

--
-- Indexes for table `gibbonFormSubmission`
--
ALTER TABLE `gibbonFormSubmission`
  ADD PRIMARY KEY (`gibbonFormSubmissionID`),
  ADD KEY `foreignTable` (`foreignTable`,`foreignTableID`);

--
-- Indexes for table `gibbonFormUpload`
--
ALTER TABLE `gibbonFormUpload`
  ADD PRIMARY KEY (`gibbonFormUploadID`),
  ADD KEY `foreignTable` (`foreignTable`,`foreignTableID`);

--
-- Indexes for table `gibbonGroup`
--
ALTER TABLE `gibbonGroup`
  ADD PRIMARY KEY (`gibbonGroupID`);

--
-- Indexes for table `gibbonGroupPerson`
--
ALTER TABLE `gibbonGroupPerson`
  ADD PRIMARY KEY (`gibbonGroupPersonID`),
  ADD UNIQUE KEY `gibbonGroupID` (`gibbonGroupID`,`gibbonPersonID`);

--
-- Indexes for table `gibbonHook`
--
ALTER TABLE `gibbonHook`
  ADD PRIMARY KEY (`gibbonHookID`),
  ADD UNIQUE KEY `name` (`name`,`type`);

--
-- Indexes for table `gibbonHouse`
--
ALTER TABLE `gibbonHouse`
  ADD PRIMARY KEY (`gibbonHouseID`),
  ADD UNIQUE KEY `name` (`name`,`nameShort`);

--
-- Indexes for table `gibboni18n`
--
ALTER TABLE `gibboni18n`
  ADD PRIMARY KEY (`gibboni18nID`);

--
-- Indexes for table `gibbonIN`
--
ALTER TABLE `gibbonIN`
  ADD PRIMARY KEY (`gibbonINID`),
  ADD UNIQUE KEY `gibbonPersonID` (`gibbonPersonID`);

--
-- Indexes for table `gibbonINArchive`
--
ALTER TABLE `gibbonINArchive`
  ADD PRIMARY KEY (`gibbonINArchiveID`);

--
-- Indexes for table `gibbonINAssistant`
--
ALTER TABLE `gibbonINAssistant`
  ADD PRIMARY KEY (`gibbonINAssistantID`);

--
-- Indexes for table `gibbonINDescriptor`
--
ALTER TABLE `gibbonINDescriptor`
  ADD PRIMARY KEY (`gibbonINDescriptorID`);

--
-- Indexes for table `gibbonINInvestigation`
--
ALTER TABLE `gibbonINInvestigation`
  ADD PRIMARY KEY (`gibbonINInvestigationID`);

--
-- Indexes for table `gibbonINInvestigationContribution`
--
ALTER TABLE `gibbonINInvestigationContribution`
  ADD PRIMARY KEY (`gibbonINInvestigationContributionID`);

--
-- Indexes for table `gibbonINPersonDescriptor`
--
ALTER TABLE `gibbonINPersonDescriptor`
  ADD PRIMARY KEY (`gibbonINPersonDescriptorID`);

--
-- Indexes for table `gibbonInternalAssessmentColumn`
--
ALTER TABLE `gibbonInternalAssessmentColumn`
  ADD PRIMARY KEY (`gibbonInternalAssessmentColumnID`);

--
-- Indexes for table `gibbonInternalAssessmentEntry`
--
ALTER TABLE `gibbonInternalAssessmentEntry`
  ADD PRIMARY KEY (`gibbonInternalAssessmentEntryID`);

--
-- Indexes for table `gibbonLanguage`
--
ALTER TABLE `gibbonLanguage`
  ADD PRIMARY KEY (`gibbonLanguageID`);

--
-- Indexes for table `gibbonLibraryItem`
--
ALTER TABLE `gibbonLibraryItem`
  ADD PRIMARY KEY (`gibbonLibraryItemID`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `gibbonLibraryItemEvent`
--
ALTER TABLE `gibbonLibraryItemEvent`
  ADD PRIMARY KEY (`gibbonLibraryItemEventID`);

--
-- Indexes for table `gibbonLibraryShelf`
--
ALTER TABLE `gibbonLibraryShelf`
  ADD PRIMARY KEY (`gibbonLibraryShelfID`);

--
-- Indexes for table `gibbonLibraryShelfItem`
--
ALTER TABLE `gibbonLibraryShelfItem`
  ADD PRIMARY KEY (`gibbonLibraryShelfItemID`);

--
-- Indexes for table `gibbonLibraryType`
--
ALTER TABLE `gibbonLibraryType`
  ADD PRIMARY KEY (`gibbonLibraryTypeID`);

--
-- Indexes for table `gibbonLog`
--
ALTER TABLE `gibbonLog`
  ADD PRIMARY KEY (`gibbonLogID`);

--
-- Indexes for table `gibbonMarkbookColumn`
--
ALTER TABLE `gibbonMarkbookColumn`
  ADD PRIMARY KEY (`gibbonMarkbookColumnID`),
  ADD KEY `gibbonCourseClassID` (`gibbonCourseClassID`),
  ADD KEY `completeDate` (`completeDate`),
  ADD KEY `complete` (`complete`);

--
-- Indexes for table `gibbonMarkbookEntry`
--
ALTER TABLE `gibbonMarkbookEntry`
  ADD PRIMARY KEY (`gibbonMarkbookEntryID`),
  ADD KEY `gibbonPersonIDStudent` (`gibbonPersonIDStudent`),
  ADD KEY `gibbonMarkbookColumnID` (`gibbonMarkbookColumnID`);

--
-- Indexes for table `gibbonMarkbookTarget`
--
ALTER TABLE `gibbonMarkbookTarget`
  ADD PRIMARY KEY (`gibbonMarkbookTargetID`),
  ADD UNIQUE KEY `coursePerson` (`gibbonCourseClassID`,`gibbonPersonIDStudent`);

--
-- Indexes for table `gibbonMarkbookWeight`
--
ALTER TABLE `gibbonMarkbookWeight`
  ADD PRIMARY KEY (`gibbonMarkbookWeightID`);

--
-- Indexes for table `gibbonMedicalCondition`
--
ALTER TABLE `gibbonMedicalCondition`
  ADD PRIMARY KEY (`gibbonMedicalConditionID`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `gibbonMessenger`
--
ALTER TABLE `gibbonMessenger`
  ADD PRIMARY KEY (`gibbonMessengerID`);

--
-- Indexes for table `gibbonMessengerCannedResponse`
--
ALTER TABLE `gibbonMessengerCannedResponse`
  ADD PRIMARY KEY (`gibbonMessengerCannedResponseID`);

--
-- Indexes for table `gibbonMessengerReceipt`
--
ALTER TABLE `gibbonMessengerReceipt`
  ADD PRIMARY KEY (`gibbonMessengerReceiptID`);

--
-- Indexes for table `gibbonMessengerTarget`
--
ALTER TABLE `gibbonMessengerTarget`
  ADD PRIMARY KEY (`gibbonMessengerTargetID`),
  ADD KEY `gibbonMessengerID` (`gibbonMessengerID`,`gibbonMessengerTargetID`);

--
-- Indexes for table `gibbonMigration`
--
ALTER TABLE `gibbonMigration`
  ADD PRIMARY KEY (`gibbonMigrationID`);

--
-- Indexes for table `gibbonModule`
--
ALTER TABLE `gibbonModule`
  ADD PRIMARY KEY (`gibbonModuleID`),
  ADD UNIQUE KEY `gibbonModuleName` (`name`);

--
-- Indexes for table `gibbonNotification`
--
ALTER TABLE `gibbonNotification`
  ADD PRIMARY KEY (`gibbonNotificationID`),
  ADD KEY `gibbonPersonID` (`gibbonPersonID`);

--
-- Indexes for table `gibbonNotificationEvent`
--
ALTER TABLE `gibbonNotificationEvent`
  ADD PRIMARY KEY (`gibbonNotificationEventID`),
  ADD UNIQUE KEY `event` (`event`,`moduleName`);

--
-- Indexes for table `gibbonNotificationListener`
--
ALTER TABLE `gibbonNotificationListener`
  ADD PRIMARY KEY (`gibbonNotificationListenerID`);

--
-- Indexes for table `gibbonOutcome`
--
ALTER TABLE `gibbonOutcome`
  ADD PRIMARY KEY (`gibbonOutcomeID`);

--
-- Indexes for table `gibbonPayment`
--
ALTER TABLE `gibbonPayment`
  ADD PRIMARY KEY (`gibbonPaymentID`);

--
-- Indexes for table `gibbonPermission`
--
ALTER TABLE `gibbonPermission`
  ADD PRIMARY KEY (`permissionID`),
  ADD KEY `gibbonRoleID` (`gibbonRoleID`),
  ADD KEY `gibbonActionID` (`gibbonActionID`);

--
-- Indexes for table `gibbonPerson`
--
ALTER TABLE `gibbonPerson`
  ADD PRIMARY KEY (`gibbonPersonID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `username_2` (`username`,`email`);

--
-- Indexes for table `gibbonPersonalDocument`
--
ALTER TABLE `gibbonPersonalDocument`
  ADD PRIMARY KEY (`gibbonPersonalDocumentID`),
  ADD UNIQUE KEY `foreignTableID` (`gibbonPersonalDocumentTypeID`,`foreignTable`,`foreignTableID`);

--
-- Indexes for table `gibbonPersonalDocumentType`
--
ALTER TABLE `gibbonPersonalDocumentType`
  ADD PRIMARY KEY (`gibbonPersonalDocumentTypeID`);

--
-- Indexes for table `gibbonPersonMedical`
--
ALTER TABLE `gibbonPersonMedical`
  ADD PRIMARY KEY (`gibbonPersonMedicalID`),
  ADD KEY `gibbonPersonID` (`gibbonPersonID`);

--
-- Indexes for table `gibbonPersonMedicalCondition`
--
ALTER TABLE `gibbonPersonMedicalCondition`
  ADD PRIMARY KEY (`gibbonPersonMedicalConditionID`),
  ADD KEY `gibbonPersonMedicalID` (`gibbonPersonMedicalID`);

--
-- Indexes for table `gibbonPersonMedicalConditionUpdate`
--
ALTER TABLE `gibbonPersonMedicalConditionUpdate`
  ADD PRIMARY KEY (`gibbonPersonMedicalConditionUpdateID`);

--
-- Indexes for table `gibbonPersonMedicalUpdate`
--
ALTER TABLE `gibbonPersonMedicalUpdate`
  ADD PRIMARY KEY (`gibbonPersonMedicalUpdateID`),
  ADD KEY `gibbonMedicalIndex` (`gibbonPersonID`,`gibbonPersonMedicalID`,`gibbonSchoolYearID`);

--
-- Indexes for table `gibbonPersonReset`
--
ALTER TABLE `gibbonPersonReset`
  ADD PRIMARY KEY (`gibbonPersonResetID`);

--
-- Indexes for table `gibbonPersonStatusLog`
--
ALTER TABLE `gibbonPersonStatusLog`
  ADD PRIMARY KEY (`gibbonPersonStatusLogID`),
  ADD KEY `gibbonPersonID` (`gibbonPersonID`);

--
-- Indexes for table `gibbonPersonUpdate`
--
ALTER TABLE `gibbonPersonUpdate`
  ADD PRIMARY KEY (`gibbonPersonUpdateID`),
  ADD KEY `gibbonPersonIndex` (`gibbonPersonID`,`gibbonSchoolYearID`);

--
-- Indexes for table `gibbonPlannerEntry`
--
ALTER TABLE `gibbonPlannerEntry`
  ADD PRIMARY KEY (`gibbonPlannerEntryID`),
  ADD KEY `gibbonCourseClassID` (`gibbonCourseClassID`);

--
-- Indexes for table `gibbonPlannerEntryDiscuss`
--
ALTER TABLE `gibbonPlannerEntryDiscuss`
  ADD PRIMARY KEY (`gibbonPlannerEntryDiscussID`);

--
-- Indexes for table `gibbonPlannerEntryGuest`
--
ALTER TABLE `gibbonPlannerEntryGuest`
  ADD PRIMARY KEY (`gibbonPlannerEntryGuestID`);

--
-- Indexes for table `gibbonPlannerEntryHomework`
--
ALTER TABLE `gibbonPlannerEntryHomework`
  ADD PRIMARY KEY (`gibbonPlannerEntryHomeworkID`);

--
-- Indexes for table `gibbonPlannerEntryOutcome`
--
ALTER TABLE `gibbonPlannerEntryOutcome`
  ADD PRIMARY KEY (`gibbonPlannerEntryOutcomeID`);

--
-- Indexes for table `gibbonPlannerEntryStudentHomework`
--
ALTER TABLE `gibbonPlannerEntryStudentHomework`
  ADD PRIMARY KEY (`gibbonPlannerEntryStudentHomeworkID`),
  ADD KEY `gibbonPlannerEntryID` (`gibbonPlannerEntryID`,`gibbonPersonID`);

--
-- Indexes for table `gibbonPlannerEntryStudentTracker`
--
ALTER TABLE `gibbonPlannerEntryStudentTracker`
  ADD PRIMARY KEY (`gibbonPlannerEntryStudentTrackerID`);

--
-- Indexes for table `gibbonPlannerParentWeeklyEmailSummary`
--
ALTER TABLE `gibbonPlannerParentWeeklyEmailSummary`
  ADD PRIMARY KEY (`gibbonPlannerParentWeeklyEmailSummaryID`),
  ADD UNIQUE KEY `key` (`key`);

--
-- Indexes for table `gibbonReport`
--
ALTER TABLE `gibbonReport`
  ADD PRIMARY KEY (`gibbonReportID`);

--
-- Indexes for table `gibbonReportArchive`
--
ALTER TABLE `gibbonReportArchive`
  ADD PRIMARY KEY (`gibbonReportArchiveID`);

--
-- Indexes for table `gibbonReportArchiveEntry`
--
ALTER TABLE `gibbonReportArchiveEntry`
  ADD PRIMARY KEY (`gibbonReportArchiveEntryID`),
  ADD UNIQUE KEY `archiveEntry` (`gibbonReportArchiveID`,`gibbonSchoolYearID`,`reportIdentifier`,`type`,`gibbonYearGroupID`,`gibbonPersonID`);

--
-- Indexes for table `gibbonReportingAccess`
--
ALTER TABLE `gibbonReportingAccess`
  ADD PRIMARY KEY (`gibbonReportingAccessID`);

--
-- Indexes for table `gibbonReportingCriteria`
--
ALTER TABLE `gibbonReportingCriteria`
  ADD PRIMARY KEY (`gibbonReportingCriteriaID`);

--
-- Indexes for table `gibbonReportingCriteriaType`
--
ALTER TABLE `gibbonReportingCriteriaType`
  ADD PRIMARY KEY (`gibbonReportingCriteriaTypeID`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `gibbonReportingCycle`
--
ALTER TABLE `gibbonReportingCycle`
  ADD PRIMARY KEY (`gibbonReportingCycleID`);

--
-- Indexes for table `gibbonReportingProgress`
--
ALTER TABLE `gibbonReportingProgress`
  ADD PRIMARY KEY (`gibbonReportingProgressID`),
  ADD UNIQUE KEY `gibbonReportingScopeID` (`gibbonReportingScopeID`,`gibbonCourseClassID`,`gibbonPersonIDStudent`);

--
-- Indexes for table `gibbonReportingProof`
--
ALTER TABLE `gibbonReportingProof`
  ADD PRIMARY KEY (`gibbonReportingProofID`),
  ADD UNIQUE KEY `gibbonReportingValueID` (`gibbonReportingValueID`);

--
-- Indexes for table `gibbonReportingScope`
--
ALTER TABLE `gibbonReportingScope`
  ADD PRIMARY KEY (`gibbonReportingScopeID`);

--
-- Indexes for table `gibbonReportingValue`
--
ALTER TABLE `gibbonReportingValue`
  ADD PRIMARY KEY (`gibbonReportingValueID`),
  ADD UNIQUE KEY `gibbonReportingCriteriaID` (`gibbonReportingCriteriaID`,`gibbonPersonIDStudent`,`gibbonCourseClassID`) USING BTREE;

--
-- Indexes for table `gibbonReportPrototypeSection`
--
ALTER TABLE `gibbonReportPrototypeSection`
  ADD PRIMARY KEY (`gibbonReportPrototypeSectionID`),
  ADD UNIQUE KEY `type` (`type`,`templateFile`);

--
-- Indexes for table `gibbonReportTemplate`
--
ALTER TABLE `gibbonReportTemplate`
  ADD PRIMARY KEY (`gibbonReportTemplateID`);

--
-- Indexes for table `gibbonReportTemplateFont`
--
ALTER TABLE `gibbonReportTemplateFont`
  ADD PRIMARY KEY (`gibbonReportTemplateFontID`),
  ADD UNIQUE KEY `fontTCPDF` (`fontTCPDF`);

--
-- Indexes for table `gibbonReportTemplateSection`
--
ALTER TABLE `gibbonReportTemplateSection`
  ADD PRIMARY KEY (`gibbonReportTemplateSectionID`);

--
-- Indexes for table `gibbonResource`
--
ALTER TABLE `gibbonResource`
  ADD PRIMARY KEY (`gibbonResourceID`);

--
-- Indexes for table `gibbonResourceTag`
--
ALTER TABLE `gibbonResourceTag`
  ADD PRIMARY KEY (`gibbonResourceTagID`),
  ADD UNIQUE KEY `tag` (`tag`),
  ADD KEY `tag_2` (`tag`);

--
-- Indexes for table `gibbonRole`
--
ALTER TABLE `gibbonRole`
  ADD PRIMARY KEY (`gibbonRoleID`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `nameShort` (`nameShort`);

--
-- Indexes for table `gibbonRubric`
--
ALTER TABLE `gibbonRubric`
  ADD PRIMARY KEY (`gibbonRubricID`);

--
-- Indexes for table `gibbonRubricCell`
--
ALTER TABLE `gibbonRubricCell`
  ADD PRIMARY KEY (`gibbonRubricCellID`),
  ADD KEY `gibbonRubricID` (`gibbonRubricID`),
  ADD KEY `gibbonRubricColumnID` (`gibbonRubricColumnID`),
  ADD KEY `gibbonRubricRowID` (`gibbonRubricRowID`);

--
-- Indexes for table `gibbonRubricColumn`
--
ALTER TABLE `gibbonRubricColumn`
  ADD PRIMARY KEY (`gibbonRubricColumnID`),
  ADD KEY `gibbonRubricID` (`gibbonRubricID`);

--
-- Indexes for table `gibbonRubricEntry`
--
ALTER TABLE `gibbonRubricEntry`
  ADD PRIMARY KEY (`gibbonRubricEntry`),
  ADD KEY `gibbonRubricID` (`gibbonRubricID`),
  ADD KEY `gibbonPersonID` (`gibbonPersonID`),
  ADD KEY `gibbonRubricCellID` (`gibbonRubricCellID`),
  ADD KEY `contextDBTable` (`contextDBTable`),
  ADD KEY `contextDBTableID` (`contextDBTableID`);

--
-- Indexes for table `gibbonRubricRow`
--
ALTER TABLE `gibbonRubricRow`
  ADD PRIMARY KEY (`gibbonRubricRowID`),
  ADD KEY `gibbonRubricID` (`gibbonRubricID`);

--
-- Indexes for table `gibbonScale`
--
ALTER TABLE `gibbonScale`
  ADD PRIMARY KEY (`gibbonScaleID`);

--
-- Indexes for table `gibbonScaleGrade`
--
ALTER TABLE `gibbonScaleGrade`
  ADD PRIMARY KEY (`gibbonScaleGradeID`);

--
-- Indexes for table `gibbonSchoolYear`
--
ALTER TABLE `gibbonSchoolYear`
  ADD PRIMARY KEY (`gibbonSchoolYearID`),
  ADD UNIQUE KEY `academicYearName` (`name`),
  ADD UNIQUE KEY `sequenceNumber` (`sequenceNumber`);

--
-- Indexes for table `gibbonSchoolYearSpecialDay`
--
ALTER TABLE `gibbonSchoolYearSpecialDay`
  ADD PRIMARY KEY (`gibbonSchoolYearSpecialDayID`),
  ADD UNIQUE KEY `date` (`date`);

--
-- Indexes for table `gibbonSchoolYearTerm`
--
ALTER TABLE `gibbonSchoolYearTerm`
  ADD PRIMARY KEY (`gibbonSchoolYearTermID`),
  ADD UNIQUE KEY `sequenceNumber` (`sequenceNumber`,`gibbonSchoolYearID`);

--
-- Indexes for table `gibbonSession`
--
ALTER TABLE `gibbonSession`
  ADD PRIMARY KEY (`gibbonSessionID`);

--
-- Indexes for table `gibbonSetting`
--
ALTER TABLE `gibbonSetting`
  ADD PRIMARY KEY (`gibbonSettingID`),
  ADD UNIQUE KEY `scope` (`scope`,`nameDisplay`),
  ADD UNIQUE KEY `scope_2` (`scope`,`name`);

--
-- Indexes for table `gibbonSpace`
--
ALTER TABLE `gibbonSpace`
  ADD PRIMARY KEY (`gibbonSpaceID`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `gibbonSpacePerson`
--
ALTER TABLE `gibbonSpacePerson`
  ADD PRIMARY KEY (`gibbonSpacePersonID`);

--
-- Indexes for table `gibbonStaff`
--
ALTER TABLE `gibbonStaff`
  ADD PRIMARY KEY (`gibbonStaffID`),
  ADD UNIQUE KEY `gibbonPersonID` (`gibbonPersonID`),
  ADD UNIQUE KEY `initials` (`initials`);

--
-- Indexes for table `gibbonStaffAbsence`
--
ALTER TABLE `gibbonStaffAbsence`
  ADD PRIMARY KEY (`gibbonStaffAbsenceID`);

--
-- Indexes for table `gibbonStaffAbsenceDate`
--
ALTER TABLE `gibbonStaffAbsenceDate`
  ADD PRIMARY KEY (`gibbonStaffAbsenceDateID`);

--
-- Indexes for table `gibbonStaffAbsenceType`
--
ALTER TABLE `gibbonStaffAbsenceType`
  ADD PRIMARY KEY (`gibbonStaffAbsenceTypeID`);

--
-- Indexes for table `gibbonStaffApplicationForm`
--
ALTER TABLE `gibbonStaffApplicationForm`
  ADD PRIMARY KEY (`gibbonStaffApplicationFormID`);

--
-- Indexes for table `gibbonStaffApplicationFormFile`
--
ALTER TABLE `gibbonStaffApplicationFormFile`
  ADD PRIMARY KEY (`gibbonStaffApplicationFormFileID`);

--
-- Indexes for table `gibbonStaffContract`
--
ALTER TABLE `gibbonStaffContract`
  ADD PRIMARY KEY (`gibbonStaffContractID`);

--
-- Indexes for table `gibbonStaffCoverage`
--
ALTER TABLE `gibbonStaffCoverage`
  ADD PRIMARY KEY (`gibbonStaffCoverageID`);

--
-- Indexes for table `gibbonStaffCoverageDate`
--
ALTER TABLE `gibbonStaffCoverageDate`
  ADD PRIMARY KEY (`gibbonStaffCoverageDateID`),
  ADD KEY `foreignTable` (`foreignTable`,`foreignTableID`);

--
-- Indexes for table `gibbonStaffDuty`
--
ALTER TABLE `gibbonStaffDuty`
  ADD PRIMARY KEY (`gibbonStaffDutyID`);

--
-- Indexes for table `gibbonStaffDutyPerson`
--
ALTER TABLE `gibbonStaffDutyPerson`
  ADD PRIMARY KEY (`gibbonStaffDutyPersonID`),
  ADD UNIQUE KEY `gibbonStaffDutyID` (`gibbonStaffDutyID`,`gibbonDaysOfWeekID`,`gibbonPersonID`);

--
-- Indexes for table `gibbonStaffJobOpening`
--
ALTER TABLE `gibbonStaffJobOpening`
  ADD PRIMARY KEY (`gibbonStaffJobOpeningID`);

--
-- Indexes for table `gibbonStaffUpdate`
--
ALTER TABLE `gibbonStaffUpdate`
  ADD PRIMARY KEY (`gibbonStaffUpdateID`);

--
-- Indexes for table `gibbonString`
--
ALTER TABLE `gibbonString`
  ADD PRIMARY KEY (`gibbonStringID`);

--
-- Indexes for table `gibbonStudentEnrolment`
--
ALTER TABLE `gibbonStudentEnrolment`
  ADD PRIMARY KEY (`gibbonStudentEnrolmentID`),
  ADD KEY `gibbonSchoolYearID` (`gibbonSchoolYearID`),
  ADD KEY `gibbonYearGroupID` (`gibbonYearGroupID`),
  ADD KEY `gibbonPersonIndex` (`gibbonPersonID`,`gibbonSchoolYearID`),
  ADD KEY `gibbonFormGroupID` (`gibbonFormGroupID`);

--
-- Indexes for table `gibbonStudentNote`
--
ALTER TABLE `gibbonStudentNote`
  ADD PRIMARY KEY (`gibbonStudentNoteID`);

--
-- Indexes for table `gibbonStudentNoteCategory`
--
ALTER TABLE `gibbonStudentNoteCategory`
  ADD PRIMARY KEY (`gibbonStudentNoteCategoryID`);

--
-- Indexes for table `gibbonSubstitute`
--
ALTER TABLE `gibbonSubstitute`
  ADD PRIMARY KEY (`gibbonSubstituteID`),
  ADD UNIQUE KEY `gibbonPersonID` (`gibbonPersonID`);

--
-- Indexes for table `gibbonTheme`
--
ALTER TABLE `gibbonTheme`
  ADD PRIMARY KEY (`gibbonThemeID`);

--
-- Indexes for table `gibbonTT`
--
ALTER TABLE `gibbonTT`
  ADD PRIMARY KEY (`gibbonTTID`);

--
-- Indexes for table `gibbonTTColumn`
--
ALTER TABLE `gibbonTTColumn`
  ADD PRIMARY KEY (`gibbonTTColumnID`);

--
-- Indexes for table `gibbonTTColumnRow`
--
ALTER TABLE `gibbonTTColumnRow`
  ADD PRIMARY KEY (`gibbonTTColumnRowID`),
  ADD KEY `gibbonTTColumnID` (`gibbonTTColumnID`);

--
-- Indexes for table `gibbonTTDay`
--
ALTER TABLE `gibbonTTDay`
  ADD PRIMARY KEY (`gibbonTTDayID`);

--
-- Indexes for table `gibbonTTDayDate`
--
ALTER TABLE `gibbonTTDayDate`
  ADD PRIMARY KEY (`gibbonTTDayDateID`),
  ADD KEY `gibbonTTDayID` (`gibbonTTDayID`);

--
-- Indexes for table `gibbonTTDayRowClass`
--
ALTER TABLE `gibbonTTDayRowClass`
  ADD PRIMARY KEY (`gibbonTTDayRowClassID`),
  ADD KEY `gibbonCourseClassID` (`gibbonCourseClassID`),
  ADD KEY `gibbonSpaceID` (`gibbonSpaceID`),
  ADD KEY `gibbonTTColumnRowID` (`gibbonTTColumnRowID`);

--
-- Indexes for table `gibbonTTDayRowClassException`
--
ALTER TABLE `gibbonTTDayRowClassException`
  ADD PRIMARY KEY (`gibbonTTDayRowClassExceptionID`);

--
-- Indexes for table `gibbonTTImport`
--
ALTER TABLE `gibbonTTImport`
  ADD PRIMARY KEY (`gibbonTTImportID`);

--
-- Indexes for table `gibbonTTSpaceBooking`
--
ALTER TABLE `gibbonTTSpaceBooking`
  ADD PRIMARY KEY (`gibbonTTSpaceBookingID`);

--
-- Indexes for table `gibbonTTSpaceChange`
--
ALTER TABLE `gibbonTTSpaceChange`
  ADD PRIMARY KEY (`gibbonTTSpaceChangeID`),
  ADD KEY `gibbonTTDayRowClassID` (`gibbonTTDayRowClassID`),
  ADD KEY `date` (`date`);

--
-- Indexes for table `gibbonUnit`
--
ALTER TABLE `gibbonUnit`
  ADD PRIMARY KEY (`gibbonUnitID`);

--
-- Indexes for table `gibbonUnitBlock`
--
ALTER TABLE `gibbonUnitBlock`
  ADD PRIMARY KEY (`gibbonUnitBlockID`);

--
-- Indexes for table `gibbonUnitClass`
--
ALTER TABLE `gibbonUnitClass`
  ADD PRIMARY KEY (`gibbonUnitClassID`);

--
-- Indexes for table `gibbonUnitClassBlock`
--
ALTER TABLE `gibbonUnitClassBlock`
  ADD PRIMARY KEY (`gibbonUnitClassBlockID`);

--
-- Indexes for table `gibbonUnitOutcome`
--
ALTER TABLE `gibbonUnitOutcome`
  ADD PRIMARY KEY (`gibbonUnitOutcomeID`);

--
-- Indexes for table `gibbonUsernameFormat`
--
ALTER TABLE `gibbonUsernameFormat`
  ADD PRIMARY KEY (`gibbonUsernameFormatID`);

--
-- Indexes for table `gibbonYearGroup`
--
ALTER TABLE `gibbonYearGroup`
  ADD PRIMARY KEY (`gibbonYearGroupID`),
  ADD UNIQUE KEY `name` (`name`,`nameShort`,`sequenceNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gibbonAction`
--
ALTER TABLE `gibbonAction`
  MODIFY `gibbonActionID` int(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=999;

--
-- AUTO_INCREMENT for table `gibbonActivity`
--
ALTER TABLE `gibbonActivity`
  MODIFY `gibbonActivityID` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonActivityAttendance`
--
ALTER TABLE `gibbonActivityAttendance`
  MODIFY `gibbonActivityAttendanceID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonActivitySlot`
--
ALTER TABLE `gibbonActivitySlot`
  MODIFY `gibbonActivitySlotID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonActivityStaff`
--
ALTER TABLE `gibbonActivityStaff`
  MODIFY `gibbonActivityStaffID` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonActivityStudent`
--
ALTER TABLE `gibbonActivityStudent`
  MODIFY `gibbonActivityStudentID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonActivityType`
--
ALTER TABLE `gibbonActivityType`
  MODIFY `gibbonActivityTypeID` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonAdmissionsAccount`
--
ALTER TABLE `gibbonAdmissionsAccount`
  MODIFY `gibbonAdmissionsAccountID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonAdmissionsApplication`
--
ALTER TABLE `gibbonAdmissionsApplication`
  MODIFY `gibbonAdmissionsApplicationID` int(12) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonAlarm`
--
ALTER TABLE `gibbonAlarm`
  MODIFY `gibbonAlarmID` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonAlarmConfirm`
--
ALTER TABLE `gibbonAlarmConfirm`
  MODIFY `gibbonAlarmConfirmID` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonAlertLevel`
--
ALTER TABLE `gibbonAlertLevel`
  MODIFY `gibbonAlertLevelID` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gibbonApplicationForm`
--
ALTER TABLE `gibbonApplicationForm`
  MODIFY `gibbonApplicationFormID` int(12) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonApplicationFormFile`
--
ALTER TABLE `gibbonApplicationFormFile`
  MODIFY `gibbonApplicationFormFileID` int(14) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonApplicationFormLink`
--
ALTER TABLE `gibbonApplicationFormLink`
  MODIFY `gibbonApplicationFormLinkID` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonApplicationFormRelationship`
--
ALTER TABLE `gibbonApplicationFormRelationship`
  MODIFY `gibbonApplicationFormRelationshipID` int(14) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonAttendanceCode`
--
ALTER TABLE `gibbonAttendanceCode`
  MODIFY `gibbonAttendanceCodeID` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gibbonAttendanceLogCourseClass`
--
ALTER TABLE `gibbonAttendanceLogCourseClass`
  MODIFY `gibbonAttendanceLogCourseClassID` int(14) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonAttendanceLogFormGroup`
--
ALTER TABLE `gibbonAttendanceLogFormGroup`
  MODIFY `gibbonAttendanceLogFormGroupID` int(14) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonAttendanceLogPerson`
--
ALTER TABLE `gibbonAttendanceLogPerson`
  MODIFY `gibbonAttendanceLogPersonID` int(14) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonBehaviour`
--
ALTER TABLE `gibbonBehaviour`
  MODIFY `gibbonBehaviourID` int(12) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonBehaviourFollowUp`
--
ALTER TABLE `gibbonBehaviourFollowUp`
  MODIFY `gibbonBehaviourFollowUpID` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonBehaviourLetter`
--
ALTER TABLE `gibbonBehaviourLetter`
  MODIFY `gibbonBehaviourLetterID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonCourse`
--
ALTER TABLE `gibbonCourse`
  MODIFY `gibbonCourseID` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonCourseClass`
--
ALTER TABLE `gibbonCourseClass`
  MODIFY `gibbonCourseClassID` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonCourseClassMap`
--
ALTER TABLE `gibbonCourseClassMap`
  MODIFY `gibbonCourseClassMapID` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonCourseClassPerson`
--
ALTER TABLE `gibbonCourseClassPerson`
  MODIFY `gibbonCourseClassPersonID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonCrowdAssessDiscuss`
--
ALTER TABLE `gibbonCrowdAssessDiscuss`
  MODIFY `gibbonCrowdAssessDiscussID` int(16) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonCustomField`
--
ALTER TABLE `gibbonCustomField`
  MODIFY `gibbonCustomFieldID` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonDataRetention`
--
ALTER TABLE `gibbonDataRetention`
  MODIFY `gibbonDataRetentionID` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonDaysOfWeek`
--
ALTER TABLE `gibbonDaysOfWeek`
  MODIFY `gibbonDaysOfWeekID` int(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gibbonDepartment`
--
ALTER TABLE `gibbonDepartment`
  MODIFY `gibbonDepartmentID` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonDepartmentResource`
--
ALTER TABLE `gibbonDepartmentResource`
  MODIFY `gibbonDepartmentResourceID` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonDepartmentStaff`
--
ALTER TABLE `gibbonDepartmentStaff`
  MODIFY `gibbonDepartmentStaffID` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonDiscussion`
--
ALTER TABLE `gibbonDiscussion`
  MODIFY `gibbonDiscussionID` int(12) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonDistrict`
--
ALTER TABLE `gibbonDistrict`
  MODIFY `gibbonDistrictID` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonEmailTemplate`
--
ALTER TABLE `gibbonEmailTemplate`
  MODIFY `gibbonEmailTemplateID` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `gibbonExternalAssessment`
--
ALTER TABLE `gibbonExternalAssessment`
  MODIFY `gibbonExternalAssessmentID` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gibbonExternalAssessmentField`
--
ALTER TABLE `gibbonExternalAssessmentField`
  MODIFY `gibbonExternalAssessmentFieldID` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `gibbonExternalAssessmentStudent`
--
ALTER TABLE `gibbonExternalAssessmentStudent`
  MODIFY `gibbonExternalAssessmentStudentID` int(12) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonExternalAssessmentStudentEntry`
--
ALTER TABLE `gibbonExternalAssessmentStudentEntry`
  MODIFY `gibbonExternalAssessmentStudentEntryID` int(14) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonFamily`
--
ALTER TABLE `gibbonFamily`
  MODIFY `gibbonFamilyID` int(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonFamilyAdult`
--
ALTER TABLE `gibbonFamilyAdult`
  MODIFY `gibbonFamilyAdultID` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonFamilyChild`
--
ALTER TABLE `gibbonFamilyChild`
  MODIFY `gibbonFamilyChildID` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonFamilyRelationship`
--
ALTER TABLE `gibbonFamilyRelationship`
  MODIFY `gibbonFamilyRelationshipID` int(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonFamilyUpdate`
--
ALTER TABLE `gibbonFamilyUpdate`
  MODIFY `gibbonFamilyUpdateID` int(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonFileExtension`
--
ALTER TABLE `gibbonFileExtension`
  MODIFY `gibbonFileExtensionID` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `gibbonFinanceBillingSchedule`
--
ALTER TABLE `gibbonFinanceBillingSchedule`
  MODIFY `gibbonFinanceBillingScheduleID` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonFinanceBudget`
--
ALTER TABLE `gibbonFinanceBudget`
  MODIFY `gibbonFinanceBudgetID` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonFinanceBudgetCycle`
--
ALTER TABLE `gibbonFinanceBudgetCycle`
  MODIFY `gibbonFinanceBudgetCycleID` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonFinanceBudgetCycleAllocation`
--
ALTER TABLE `gibbonFinanceBudgetCycleAllocation`
  MODIFY `gibbonFinanceBudgetCycleAllocationID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonFinanceBudgetPerson`
--
ALTER TABLE `gibbonFinanceBudgetPerson`
  MODIFY `gibbonFinanceBudgetPersonID` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonFinanceExpense`
--
ALTER TABLE `gibbonFinanceExpense`
  MODIFY `gibbonFinanceExpenseID` int(14) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonFinanceExpenseApprover`
--
ALTER TABLE `gibbonFinanceExpenseApprover`
  MODIFY `gibbonFinanceExpenseApproverID` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonFinanceExpenseLog`
--
ALTER TABLE `gibbonFinanceExpenseLog`
  MODIFY `gibbonFinanceExpenseLogID` int(16) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonFinanceFee`
--
ALTER TABLE `gibbonFinanceFee`
  MODIFY `gibbonFinanceFeeID` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonFinanceFeeCategory`
--
ALTER TABLE `gibbonFinanceFeeCategory`
  MODIFY `gibbonFinanceFeeCategoryID` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gibbonFinanceInvoice`
--
ALTER TABLE `gibbonFinanceInvoice`
  MODIFY `gibbonFinanceInvoiceID` int(14) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonFinanceInvoicee`
--
ALTER TABLE `gibbonFinanceInvoicee`
  MODIFY `gibbonFinanceInvoiceeID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonFinanceInvoiceeUpdate`
--
ALTER TABLE `gibbonFinanceInvoiceeUpdate`
  MODIFY `gibbonFinanceInvoiceeUpdateID` int(12) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonFinanceInvoiceFee`
--
ALTER TABLE `gibbonFinanceInvoiceFee`
  MODIFY `gibbonFinanceInvoiceFeeID` int(15) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonFirstAid`
--
ALTER TABLE `gibbonFirstAid`
  MODIFY `gibbonFirstAidID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonFirstAidFollowUp`
--
ALTER TABLE `gibbonFirstAidFollowUp`
  MODIFY `gibbonFirstAidFollowUpID` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonForm`
--
ALTER TABLE `gibbonForm`
  MODIFY `gibbonFormID` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gibbonFormField`
--
ALTER TABLE `gibbonFormField`
  MODIFY `gibbonFormFieldID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `gibbonFormGroup`
--
ALTER TABLE `gibbonFormGroup`
  MODIFY `gibbonFormGroupID` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonFormPage`
--
ALTER TABLE `gibbonFormPage`
  MODIFY `gibbonFormPageID` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gibbonFormSubmission`
--
ALTER TABLE `gibbonFormSubmission`
  MODIFY `gibbonFormSubmissionID` int(12) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonFormUpload`
--
ALTER TABLE `gibbonFormUpload`
  MODIFY `gibbonFormUploadID` int(12) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonGroup`
--
ALTER TABLE `gibbonGroup`
  MODIFY `gibbonGroupID` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonGroupPerson`
--
ALTER TABLE `gibbonGroupPerson`
  MODIFY `gibbonGroupPersonID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonHook`
--
ALTER TABLE `gibbonHook`
  MODIFY `gibbonHookID` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonHouse`
--
ALTER TABLE `gibbonHouse`
  MODIFY `gibbonHouseID` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibboni18n`
--
ALTER TABLE `gibboni18n`
  MODIFY `gibboni18nID` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `gibbonIN`
--
ALTER TABLE `gibbonIN`
  MODIFY `gibbonINID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonINArchive`
--
ALTER TABLE `gibbonINArchive`
  MODIFY `gibbonINArchiveID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonINAssistant`
--
ALTER TABLE `gibbonINAssistant`
  MODIFY `gibbonINAssistantID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonINDescriptor`
--
ALTER TABLE `gibbonINDescriptor`
  MODIFY `gibbonINDescriptorID` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gibbonINInvestigation`
--
ALTER TABLE `gibbonINInvestigation`
  MODIFY `gibbonINInvestigationID` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonINInvestigationContribution`
--
ALTER TABLE `gibbonINInvestigationContribution`
  MODIFY `gibbonINInvestigationContributionID` int(12) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonINPersonDescriptor`
--
ALTER TABLE `gibbonINPersonDescriptor`
  MODIFY `gibbonINPersonDescriptorID` int(12) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonInternalAssessmentColumn`
--
ALTER TABLE `gibbonInternalAssessmentColumn`
  MODIFY `gibbonInternalAssessmentColumnID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonInternalAssessmentEntry`
--
ALTER TABLE `gibbonInternalAssessmentEntry`
  MODIFY `gibbonInternalAssessmentEntryID` int(12) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonLanguage`
--
ALTER TABLE `gibbonLanguage`
  MODIFY `gibbonLanguageID` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `gibbonLibraryItem`
--
ALTER TABLE `gibbonLibraryItem`
  MODIFY `gibbonLibraryItemID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonLibraryItemEvent`
--
ALTER TABLE `gibbonLibraryItemEvent`
  MODIFY `gibbonLibraryItemEventID` int(14) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonLibraryShelf`
--
ALTER TABLE `gibbonLibraryShelf`
  MODIFY `gibbonLibraryShelfID` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonLibraryShelfItem`
--
ALTER TABLE `gibbonLibraryShelfItem`
  MODIFY `gibbonLibraryShelfItemID` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonLibraryType`
--
ALTER TABLE `gibbonLibraryType`
  MODIFY `gibbonLibraryTypeID` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `gibbonLog`
--
ALTER TABLE `gibbonLog`
  MODIFY `gibbonLogID` int(16) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonMarkbookColumn`
--
ALTER TABLE `gibbonMarkbookColumn`
  MODIFY `gibbonMarkbookColumnID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonMarkbookEntry`
--
ALTER TABLE `gibbonMarkbookEntry`
  MODIFY `gibbonMarkbookEntryID` int(12) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonMarkbookTarget`
--
ALTER TABLE `gibbonMarkbookTarget`
  MODIFY `gibbonMarkbookTargetID` int(14) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonMarkbookWeight`
--
ALTER TABLE `gibbonMarkbookWeight`
  MODIFY `gibbonMarkbookWeightID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonMedicalCondition`
--
ALTER TABLE `gibbonMedicalCondition`
  MODIFY `gibbonMedicalConditionID` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `gibbonMessenger`
--
ALTER TABLE `gibbonMessenger`
  MODIFY `gibbonMessengerID` int(12) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonMessengerCannedResponse`
--
ALTER TABLE `gibbonMessengerCannedResponse`
  MODIFY `gibbonMessengerCannedResponseID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonMessengerReceipt`
--
ALTER TABLE `gibbonMessengerReceipt`
  MODIFY `gibbonMessengerReceiptID` int(14) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonMessengerTarget`
--
ALTER TABLE `gibbonMessengerTarget`
  MODIFY `gibbonMessengerTargetID` int(14) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonMigration`
--
ALTER TABLE `gibbonMigration`
  MODIFY `gibbonMigrationID` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonModule`
--
ALTER TABLE `gibbonModule`
  MODIFY `gibbonModuleID` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'This number is assigned at install, and is only unique to the installation', AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `gibbonNotification`
--
ALTER TABLE `gibbonNotification`
  MODIFY `gibbonNotificationID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonNotificationEvent`
--
ALTER TABLE `gibbonNotificationEvent`
  MODIFY `gibbonNotificationEventID` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `gibbonNotificationListener`
--
ALTER TABLE `gibbonNotificationListener`
  MODIFY `gibbonNotificationListenerID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonOutcome`
--
ALTER TABLE `gibbonOutcome`
  MODIFY `gibbonOutcomeID` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonPayment`
--
ALTER TABLE `gibbonPayment`
  MODIFY `gibbonPaymentID` int(14) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonPermission`
--
ALTER TABLE `gibbonPermission`
  MODIFY `permissionID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54068;

--
-- AUTO_INCREMENT for table `gibbonPerson`
--
ALTER TABLE `gibbonPerson`
  MODIFY `gibbonPersonID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonPersonalDocument`
--
ALTER TABLE `gibbonPersonalDocument`
  MODIFY `gibbonPersonalDocumentID` int(12) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonPersonalDocumentType`
--
ALTER TABLE `gibbonPersonalDocumentType`
  MODIFY `gibbonPersonalDocumentTypeID` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gibbonPersonMedical`
--
ALTER TABLE `gibbonPersonMedical`
  MODIFY `gibbonPersonMedicalID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonPersonMedicalCondition`
--
ALTER TABLE `gibbonPersonMedicalCondition`
  MODIFY `gibbonPersonMedicalConditionID` int(12) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonPersonMedicalConditionUpdate`
--
ALTER TABLE `gibbonPersonMedicalConditionUpdate`
  MODIFY `gibbonPersonMedicalConditionUpdateID` int(14) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonPersonMedicalUpdate`
--
ALTER TABLE `gibbonPersonMedicalUpdate`
  MODIFY `gibbonPersonMedicalUpdateID` int(12) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonPersonReset`
--
ALTER TABLE `gibbonPersonReset`
  MODIFY `gibbonPersonResetID` int(12) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonPersonStatusLog`
--
ALTER TABLE `gibbonPersonStatusLog`
  MODIFY `gibbonPersonStatusLogID` int(12) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonPersonUpdate`
--
ALTER TABLE `gibbonPersonUpdate`
  MODIFY `gibbonPersonUpdateID` int(12) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonPlannerEntry`
--
ALTER TABLE `gibbonPlannerEntry`
  MODIFY `gibbonPlannerEntryID` int(14) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonPlannerEntryDiscuss`
--
ALTER TABLE `gibbonPlannerEntryDiscuss`
  MODIFY `gibbonPlannerEntryDiscussID` int(16) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonPlannerEntryGuest`
--
ALTER TABLE `gibbonPlannerEntryGuest`
  MODIFY `gibbonPlannerEntryGuestID` int(16) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonPlannerEntryHomework`
--
ALTER TABLE `gibbonPlannerEntryHomework`
  MODIFY `gibbonPlannerEntryHomeworkID` int(16) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonPlannerEntryOutcome`
--
ALTER TABLE `gibbonPlannerEntryOutcome`
  MODIFY `gibbonPlannerEntryOutcomeID` int(16) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonPlannerEntryStudentHomework`
--
ALTER TABLE `gibbonPlannerEntryStudentHomework`
  MODIFY `gibbonPlannerEntryStudentHomeworkID` int(14) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonPlannerEntryStudentTracker`
--
ALTER TABLE `gibbonPlannerEntryStudentTracker`
  MODIFY `gibbonPlannerEntryStudentTrackerID` int(16) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonPlannerParentWeeklyEmailSummary`
--
ALTER TABLE `gibbonPlannerParentWeeklyEmailSummary`
  MODIFY `gibbonPlannerParentWeeklyEmailSummaryID` int(14) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonReport`
--
ALTER TABLE `gibbonReport`
  MODIFY `gibbonReportID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonReportArchive`
--
ALTER TABLE `gibbonReportArchive`
  MODIFY `gibbonReportArchiveID` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gibbonReportArchiveEntry`
--
ALTER TABLE `gibbonReportArchiveEntry`
  MODIFY `gibbonReportArchiveEntryID` int(12) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonReportingAccess`
--
ALTER TABLE `gibbonReportingAccess`
  MODIFY `gibbonReportingAccessID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonReportingCriteria`
--
ALTER TABLE `gibbonReportingCriteria`
  MODIFY `gibbonReportingCriteriaID` int(12) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonReportingCriteriaType`
--
ALTER TABLE `gibbonReportingCriteriaType`
  MODIFY `gibbonReportingCriteriaTypeID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gibbonReportingCycle`
--
ALTER TABLE `gibbonReportingCycle`
  MODIFY `gibbonReportingCycleID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonReportingProgress`
--
ALTER TABLE `gibbonReportingProgress`
  MODIFY `gibbonReportingProgressID` int(12) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonReportingProof`
--
ALTER TABLE `gibbonReportingProof`
  MODIFY `gibbonReportingProofID` int(12) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonReportingScope`
--
ALTER TABLE `gibbonReportingScope`
  MODIFY `gibbonReportingScopeID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonReportingValue`
--
ALTER TABLE `gibbonReportingValue`
  MODIFY `gibbonReportingValueID` int(12) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonReportPrototypeSection`
--
ALTER TABLE `gibbonReportPrototypeSection`
  MODIFY `gibbonReportPrototypeSectionID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonReportTemplate`
--
ALTER TABLE `gibbonReportTemplate`
  MODIFY `gibbonReportTemplateID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonReportTemplateFont`
--
ALTER TABLE `gibbonReportTemplateFont`
  MODIFY `gibbonReportTemplateFontID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonReportTemplateSection`
--
ALTER TABLE `gibbonReportTemplateSection`
  MODIFY `gibbonReportTemplateSectionID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonResource`
--
ALTER TABLE `gibbonResource`
  MODIFY `gibbonResourceID` int(14) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonResourceTag`
--
ALTER TABLE `gibbonResourceTag`
  MODIFY `gibbonResourceTagID` int(12) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonRole`
--
ALTER TABLE `gibbonRole`
  MODIFY `gibbonRoleID` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gibbonRubric`
--
ALTER TABLE `gibbonRubric`
  MODIFY `gibbonRubricID` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonRubricCell`
--
ALTER TABLE `gibbonRubricCell`
  MODIFY `gibbonRubricCellID` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonRubricColumn`
--
ALTER TABLE `gibbonRubricColumn`
  MODIFY `gibbonRubricColumnID` int(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonRubricEntry`
--
ALTER TABLE `gibbonRubricEntry`
  MODIFY `gibbonRubricEntry` int(14) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonRubricRow`
--
ALTER TABLE `gibbonRubricRow`
  MODIFY `gibbonRubricRowID` int(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonScale`
--
ALTER TABLE `gibbonScale`
  MODIFY `gibbonScaleID` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `gibbonScaleGrade`
--
ALTER TABLE `gibbonScaleGrade`
  MODIFY `gibbonScaleGradeID` int(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=331;

--
-- AUTO_INCREMENT for table `gibbonSchoolYear`
--
ALTER TABLE `gibbonSchoolYear`
  MODIFY `gibbonSchoolYearID` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `gibbonSchoolYearSpecialDay`
--
ALTER TABLE `gibbonSchoolYearSpecialDay`
  MODIFY `gibbonSchoolYearSpecialDayID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonSchoolYearTerm`
--
ALTER TABLE `gibbonSchoolYearTerm`
  MODIFY `gibbonSchoolYearTermID` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `gibbonSetting`
--
ALTER TABLE `gibbonSetting`
  MODIFY `gibbonSettingID` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=358;

--
-- AUTO_INCREMENT for table `gibbonSpace`
--
ALTER TABLE `gibbonSpace`
  MODIFY `gibbonSpaceID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonSpacePerson`
--
ALTER TABLE `gibbonSpacePerson`
  MODIFY `gibbonSpacePersonID` int(12) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonStaff`
--
ALTER TABLE `gibbonStaff`
  MODIFY `gibbonStaffID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonStaffAbsence`
--
ALTER TABLE `gibbonStaffAbsence`
  MODIFY `gibbonStaffAbsenceID` int(14) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonStaffAbsenceDate`
--
ALTER TABLE `gibbonStaffAbsenceDate`
  MODIFY `gibbonStaffAbsenceDateID` int(14) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonStaffAbsenceType`
--
ALTER TABLE `gibbonStaffAbsenceType`
  MODIFY `gibbonStaffAbsenceTypeID` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gibbonStaffApplicationForm`
--
ALTER TABLE `gibbonStaffApplicationForm`
  MODIFY `gibbonStaffApplicationFormID` int(12) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonStaffApplicationFormFile`
--
ALTER TABLE `gibbonStaffApplicationFormFile`
  MODIFY `gibbonStaffApplicationFormFileID` int(14) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonStaffContract`
--
ALTER TABLE `gibbonStaffContract`
  MODIFY `gibbonStaffContractID` int(12) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonStaffCoverage`
--
ALTER TABLE `gibbonStaffCoverage`
  MODIFY `gibbonStaffCoverageID` int(14) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonStaffCoverageDate`
--
ALTER TABLE `gibbonStaffCoverageDate`
  MODIFY `gibbonStaffCoverageDateID` int(14) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonStaffDuty`
--
ALTER TABLE `gibbonStaffDuty`
  MODIFY `gibbonStaffDutyID` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonStaffDutyPerson`
--
ALTER TABLE `gibbonStaffDutyPerson`
  MODIFY `gibbonStaffDutyPersonID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonStaffJobOpening`
--
ALTER TABLE `gibbonStaffJobOpening`
  MODIFY `gibbonStaffJobOpeningID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonStaffUpdate`
--
ALTER TABLE `gibbonStaffUpdate`
  MODIFY `gibbonStaffUpdateID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonString`
--
ALTER TABLE `gibbonString`
  MODIFY `gibbonStringID` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonStudentEnrolment`
--
ALTER TABLE `gibbonStudentEnrolment`
  MODIFY `gibbonStudentEnrolmentID` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonStudentNote`
--
ALTER TABLE `gibbonStudentNote`
  MODIFY `gibbonStudentNoteID` int(12) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonStudentNoteCategory`
--
ALTER TABLE `gibbonStudentNoteCategory`
  MODIFY `gibbonStudentNoteCategoryID` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `gibbonSubstitute`
--
ALTER TABLE `gibbonSubstitute`
  MODIFY `gibbonSubstituteID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonTheme`
--
ALTER TABLE `gibbonTheme`
  MODIFY `gibbonThemeID` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `gibbonTT`
--
ALTER TABLE `gibbonTT`
  MODIFY `gibbonTTID` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonTTColumn`
--
ALTER TABLE `gibbonTTColumn`
  MODIFY `gibbonTTColumnID` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonTTColumnRow`
--
ALTER TABLE `gibbonTTColumnRow`
  MODIFY `gibbonTTColumnRowID` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonTTDay`
--
ALTER TABLE `gibbonTTDay`
  MODIFY `gibbonTTDayID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonTTDayDate`
--
ALTER TABLE `gibbonTTDayDate`
  MODIFY `gibbonTTDayDateID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonTTDayRowClass`
--
ALTER TABLE `gibbonTTDayRowClass`
  MODIFY `gibbonTTDayRowClassID` int(12) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonTTDayRowClassException`
--
ALTER TABLE `gibbonTTDayRowClassException`
  MODIFY `gibbonTTDayRowClassExceptionID` int(14) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonTTImport`
--
ALTER TABLE `gibbonTTImport`
  MODIFY `gibbonTTImportID` int(14) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonTTSpaceBooking`
--
ALTER TABLE `gibbonTTSpaceBooking`
  MODIFY `gibbonTTSpaceBookingID` int(12) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonTTSpaceChange`
--
ALTER TABLE `gibbonTTSpaceChange`
  MODIFY `gibbonTTSpaceChangeID` int(12) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonUnit`
--
ALTER TABLE `gibbonUnit`
  MODIFY `gibbonUnitID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonUnitBlock`
--
ALTER TABLE `gibbonUnitBlock`
  MODIFY `gibbonUnitBlockID` int(12) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonUnitClass`
--
ALTER TABLE `gibbonUnitClass`
  MODIFY `gibbonUnitClassID` int(12) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonUnitClassBlock`
--
ALTER TABLE `gibbonUnitClassBlock`
  MODIFY `gibbonUnitClassBlockID` int(14) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonUnitOutcome`
--
ALTER TABLE `gibbonUnitOutcome`
  MODIFY `gibbonUnitOutcomeID` int(12) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gibbonUsernameFormat`
--
ALTER TABLE `gibbonUsernameFormat`
  MODIFY `gibbonUsernameFormatID` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gibbonYearGroup`
--
ALTER TABLE `gibbonYearGroup`
  MODIFY `gibbonYearGroupID` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

        */
        return true;
    }
}