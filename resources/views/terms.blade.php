@extends('layouts.site')

@section('title', 'Terms and Conditions')
@section('title-attributes', 'data-i18n=terms.pageTitle')

@section('content')
<div class="mx-auto max-w-6xl px-6 py-24">
    <h1 class="text-3xl font-semibold text-secondary mb-6" data-i18n="terms.pageHeading">Terms of Service</h1>
    
    <div class="terms-and-conditions">
        <h1 data-i18n="terms.documentHeading">Terms and Conditions</h1>
        <p><strong data-i18n="terms.updatedLabel">Last updated:</strong> <span data-i18n="terms.updatedDate">October 14, 2026</span></p>

        <h2 class="font-bold" data-i18n="terms.s1.title">1. Acceptance of Terms</h2>
        <p data-i18n="terms.s1.p1">
            By creating an account, accessing, or using RescMe ("the App"),
            you agree to these Terms and Conditions. If you do not agree
            with these terms, you must discontinue using the App.
        </p>

        <h2 class="font-bold" data-i18n="terms.s2.title">2. Description of the Service</h2>
        <p data-i18n="terms.s2.p1">
            RescMe allows users to create messages, designate recipients,
            configure scheduled delivery, and, where supported and enabled,
            share location information with designated contacts.
        </p>
        <p data-i18n="terms.s2.p2">
            The App is intended to help users communicate information to
            people they trust. It is not an emergency response service and
            does not guarantee that messages will be delivered, received,
            read, or acted upon within any specific timeframe.
        </p>

        <h2 class="font-bold" data-i18n="terms.s3.title">3. Automatic Message Delivery</h2>
        <p data-i18n="terms.s3.p1">
            Messages configured for automatic delivery will be scheduled
            for sending after the period or at the date and time defined
            by the user, subject to the App's functionality and technical
            availability.
        </p>
        <p>
            <strong data-i18n="terms.s3.p2">
                The user is solely responsible for canceling a scheduled
                message within the App before its defined sending date and
                time if they no longer wish the message to be sent.
            </strong>
        </p>
        <p data-i18n="terms.s3.p3">
            Users must not assume that a scheduled message will be canceled
            automatically because they stop using the App, uninstall it,
            lose access to their device, or lose their internet connection.
        </p>
        <p data-i18n="terms.s3.p4">
            Cancellation requires a working internet connection and
            successful communication with the service. A cancellation
            request may not take effect if it cannot be received or
            processed before the scheduled message is sent.
        </p>
        <p data-i18n="terms.s3.p5">
            The user is responsible for verifying that a cancellation has
            been successfully registered. If a message has already been
            sent, it may not be possible to recall it or prevent recipients
            from accessing it.
        </p>

        <h2 class="font-bold" data-i18n="terms.s4.title">4. Internet Connectivity and Service Availability</h2>
        <p data-i18n="terms.s4.p1">
            An active and functioning internet connection is required to
            use the App's online features, including creating or updating
            messages, managing contacts and settings, sharing location
            information, and canceling scheduled messages.
        </p>
        <p data-i18n="terms.s4.p2">
            The App's features may be unavailable or delayed due to network
            failures, server interruptions, maintenance, device limitations,
            or other technical circumstances.
        </p>
        <p data-i18n="terms.s4.p3">
            The user acknowledges that connectivity issues may prevent an
            action from being completed within the expected timeframe.
            The App does not guarantee uninterrupted availability or
            successful execution of every requested operation.
        </p>

        <h2 class="font-bold" data-i18n="terms.s5.title">5. Contacts and Location Sharing</h2>
        <p data-i18n="terms.s5.p1">
            Location information may be shared with contacts designated by
            the user, subject to the user's settings, the availability of
            location data, and the applicable device permissions.
        </p>
        <p data-i18n="terms.s5.p2">
            Only contacts authorized by the user through the App's
            available settings are intended to have access to the most
            recent location information received by the service on the
            user's behalf. Location sharing is subject to geolocation
            being enabled and the relevant permissions and settings being
            active.
        </p>
        <p data-i18n="terms.s5.p3">
            The App cannot guarantee that a location will always be current,
            accurate, or available. Location updates may be delayed,
            incomplete, or unavailable due to device settings, connectivity
            issues, operating system restrictions, or other technical
            limitations.
        </p>
        <p data-i18n="terms.s5.p4">
            Users are responsible for reviewing their authorized contacts
            and location-sharing settings and keeping them up to date.
        </p>

        <h2 class="font-bold" data-i18n="terms.s6.title">6. Privacy and Personal Data</h2>
        <p data-i18n="terms.s6.p1">
            The App is designed to keep information shared through the
            service private and restrict access according to its features,
            permissions, and user-defined settings.
        </p>
        <p data-i18n="terms.s6.p2">
            To operate and maintain the service, the App may collect and
            process the following categories of information:
        </p>
        <ul>
            <li data-i18n="terms.s6.p3">
                Information provided directly by the user through forms
                and other manual inputs.
            </li>
            <li data-i18n="terms.s6.p4">
                Account and contact information necessary to provide
                the service.
            </li>
            <li data-i18n="terms.s6.p5">
                Message content, scheduled delivery information, and
                user-defined settings.
            </li>
            <li data-i18n="terms.s6.p6">
                IP addresses and technical information about the user's
                device.
            </li>
            <li data-i18n="terms.s6.p7">
                Location information, where the relevant feature is
                enabled and the necessary permissions are granted.
            </li>
            <li data-i18n="terms.s6.p8">
                Technical logs and information necessary for security,
                troubleshooting, and service operation.
            </li>
        </ul>
        <p data-i18n="terms.s6.p9">
            Personal data will be processed for purposes related to
            providing, maintaining, securing, and improving the service,
            as well as meeting applicable legal obligations.
        </p>
        <p data-i18n="terms.s6.p10">
            The App does not sell or share users' personal data or message
            content for commercial or advertising purposes. Information
            may be processed or disclosed where necessary to provide the
            service, including delivering messages to designated recipients,
            or where disclosure is legally required.
        </p>
        <p data-i18n="terms.s6.p11">
            No online service can guarantee absolute security or
            confidentiality in every circumstance. Users should exercise
            care when creating messages or sharing sensitive information.
        </p>

        <h2 class="font-bold" data-i18n="terms.s7.title">7. Message Recipients and Their Responsibilities</h2>
        <p data-i18n="terms.s7.p1">
            Messages sent through the App may not be immediately delivered,
            viewed, acknowledged, or answered by their recipients.
        </p>
        <p data-i18n="terms.s7.p2">
            Each recipient is responsible for checking their communications
            and deciding whether and how to respond. The App does not
            guarantee that a recipient will be available, notice a message,
            understand its content, or take action in response to it.
        </p>
        <p data-i18n="terms.s7.p3">
            Users must not rely exclusively on RescMe as a means of
            obtaining urgent assistance, monitoring another person's
            safety, or ensuring that another person will take action.
        </p>
        <p data-i18n="terms.s7.p4">
            Where immediate assistance is needed, users should contact
            the appropriate emergency services or other suitable
            assistance channels directly.
        </p>

        <h2 class="font-bold" data-i18n="terms.s8.title">8. User Responsibility for Message Content</h2>
        <p data-i18n="terms.s8.p1">
            The user who creates a message is solely responsible for its
            content, accuracy, legality, and consequences.
        </p>
        <p data-i18n="terms.s8.p2">
            Users must ensure that their messages do not violate applicable
            laws, infringe third-party rights, or contain misleading,
            abusive, threatening, fraudulent, or otherwise unlawful
            material.
        </p>
        <p data-i18n="terms.s8.p3">
            The App does not endorse or assume responsibility for statements,
            instructions, claims, or other content created by users.
        </p>
        <p>
            <strong data-i18n="terms.s8.p4">
                Users are strongly advised not to create or schedule messages
                that could cause financial loss, legal consequences,
                reputational harm, or other damage to themselves or others
                if sent unexpectedly or without appropriate context.
            </strong>
        </p>
        <p data-i18n="terms.s8.p5">
            Users should carefully review message content, recipients,
            and delivery schedules before activating automatic delivery.
        </p>

        <h2 class="font-bold" data-i18n="terms.s9.title">9. Use of Message Content and Artificial Intelligence</h2>
        <p data-i18n="terms.s9.p1">
            The content of messages submitted by users is not used to train
            artificial intelligence models.
        </p>
        <p data-i18n="terms.s9.p2">
            This commitment concerns the use of message content for AI
            model training and does not prevent the technical processing
            necessary to store, manage, or deliver messages, protect the
            service, or comply with legal obligations.
        </p>

        <h2 class="font-bold" data-i18n="terms.s10.title">10. Disclosure to Authorities and Legal Obligations</h2>
        <p data-i18n="terms.s10.p1">
            The App may disclose personal data or other relevant information
            to competent authorities when required by applicable law,
            a valid legal order, or another legally binding obligation.
        </p>
        <p data-i18n="terms.s10.p2">
            Where legally permitted and appropriate, disclosures will be
            limited to the information required to comply with the
            relevant obligation.
        </p>
        <p data-i18n="terms.s10.p3">
            Nothing in these Terms prevents the App from cooperating with
            lawful investigations or fulfilling applicable regulatory
            requirements.
        </p>

        <h2 class="font-bold" data-i18n="terms.s11.title">11. Account Deletion and Data Retention</h2>
        <p data-i18n="terms.s11.p1">
            Users may request the deletion of their accounts through the
            available account-management features or other designated
            procedures.
        </p>
        <p data-i18n="terms.s11.p2">
            Deleting an account does not necessarily result in the
            immediate and irreversible deletion of every associated record.
        </p>
        <p data-i18n="terms.s11.p3">
            Certain information may be retained for the period required
            or permitted by applicable law, including for legal compliance,
            dispute resolution, fraud prevention, security, or the
            establishment, exercise, or defense of legal claims.
        </p>
        <p data-i18n="terms.s11.p4">
            Where information is no longer necessary and no legal basis
            for retention remains, it will be deleted or anonymized in
            accordance with applicable requirements and the service's
            retention practices.
        </p>

        <h2 class="font-bold" data-i18n="terms.s12.title">12. No Commercial Use of Personal Data</h2>
        <p data-i18n="terms.s12.p1">
            Personal data and message content are not sold or shared for
            advertising, data brokerage, or other independent commercial
            purposes.
        </p>
        <p data-i18n="terms.s12.p2">
            The service may process information as necessary to operate
            the App and fulfill user-requested functions, including
            transmitting messages to designated recipients and using
            service providers where necessary to deliver or maintain
            the service.
        </p>

        <h2 class="font-bold" data-i18n="terms.s13.title">13. Limitation of Responsibility</h2>
        <p data-i18n="terms.s13.p1">
            To the extent permitted by applicable law, the App and its
            operators are not responsible for failures or delays caused
            by circumstances beyond their reasonable control, including
            network interruptions, device failures, unavailable recipients,
            inaccurate information provided by users, or third-party
            service disruptions.
        </p>
        <p data-i18n="terms.s13.p2">
            The App does not guarantee that automatic messages will always
            be sent at the exact scheduled time, that location information
            will always be accurate, or that recipients will read or act
            upon messages.
        </p>
        <p data-i18n="terms.s13.p3">
            Users remain responsible for their message content, selected
            recipients, scheduling decisions, cancellation requests, and
            use of the service.
        </p>
        <p data-i18n="terms.s13.p4">
            Nothing in these Terms excludes or limits any liability or
            consumer right that cannot lawfully be excluded or limited
            under applicable law.
        </p>

        <h2 class="font-bold" data-i18n="terms.s14.title">14. Changes to These Terms</h2>
        <p data-i18n="terms.s14.p1">
            These Terms may be updated from time to time to reflect changes
            to the App, its features, applicable laws, or operational
            practices.
        </p>
        <p data-i18n="terms.s14.p2">
            The updated version will be made available through the App or
            another appropriate communication channel, together with its
            updated effective date.
        </p>
        <p data-i18n="terms.s14.p3">
            Where required by applicable law, users will be notified of
            material changes and asked to provide any necessary consent.
        </p>
        <p data-i18n="terms.s14.p4">
            To the extent permitted by applicable law, continued use of
            the App after updated Terms become effective constitutes
            acceptance of those changes. If a user does not agree with
            the updated Terms, they should discontinue using the App.
        </p>

        <h2 class="font-bold" data-i18n="terms.s15.title">15. Applicable Law and Contact</h2>
        <p data-i18n="terms.s15.p1">
            These Terms are subject to applicable laws and regulations.
            Where applicable, mandatory consumer protection and data
            protection rights remain unaffected.
        </p>
        <p data-i18n="terms.s15.p2">
            For questions, concerns, or requests relating to these Terms,
            privacy, or personal data, users should contact the service
            operator through the contact information made available
            within the App.
        </p>

        <hr>

        <p data-i18n="terms.acknowledgement">
            By using RescMe, you acknowledge that you have read and
            understood these Terms and Conditions.
        </p>
    </div>

</div>
@endsection
